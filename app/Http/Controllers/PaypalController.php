<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Config;
use App\Models\SessionBooking;
use App\Models\Appointment;

class PaypalController extends Controller {
    private $_api_context;
    // private $apiContext;
    private $mode;
    private $client_id;
    private $secret;

    public function __construct() {

        $paypal_conf = Config::get('paypal');
        // Detect if we are running in live mode or sandbox
        if($paypal_conf['settings']['mode'] == 'live'){
            $this->client_id = $paypal_conf['live_client_id'];
            $this->secret = $paypal_conf['live_secret'];
        } else {
            $this->client_id = $paypal_conf['sandbox_client_id'];
            $this->secret = $paypal_conf['sandbox_secret'];
        }

        // Set the Paypal API Context/Credentials
        $this->_api_context = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->_api_context->setConfig($paypal_conf['settings']);

        // $paypal_conf = Config::get('paypal');
        // $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        // $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithPaypal($id) {

        //return view('paywithpaypal');
        $session_data = SessionBooking::where('session_id', '=', $id)->first();
        // dd($session_data->toArray());

        return view('booking-second-step', [
            'session_data' => $session_data
        ]);
    }

    public function postPaymentWithpaypal(Request $request) {

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $session_data = SessionBooking::where('session_id', '=', $request->session()->getId())->first();

        $item_1 = new Item();
        $item_1->setName('Item 1')
            ->setCurrency('MYR')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('MYR')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('');

        $redirect_url = new RedirectUrls();
        $redirect_url->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_url)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\paypal\Exception\PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Ops, Something went wrong. Please try book again.');
                return redirect('booking/payment/'.$session_data->session_id);

            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return redirect('booking/payment/'.$session_data->session_id);
            }
            //echo $ex->getCode(); // Prints the Error Code
            //echo $ex->getData(); // Prints the detailed error message
            //die($ex);
        }

        foreach($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        \Sesssion::put('error', 'Unknown error occurred');
        return redirect('booking/payment/'.$session_data->session_id);
    }

    public function getPaymentStatus(Request $request) {
        $payment_id = Session::get('paypal_payment_id');
        $session_data = SessionBooking::where('session_id', '=', $request->session()->getId())->first();

        Session::forget('paypal_payment_id');

        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            // dd('sadas 111');
            \Session::put('error', 'Payment failed');
            return redirect('booking/payment/'.$session_data->session_id);//->withErrors(['Payment failed']);
        }
        $payment = Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            $appointment = new Appointment();
            $appointment->barber_id = 0;
            $appointment->booking_id = $session_data->id;
            $appointment->customer_id = $session_data->customer_id;
            $appointment->senior_cut = $session_data->senior_cut;
            $appointment->junior_cut = $session_data->junior_cut;
            // $appointment->longcut = 0;
            $appointment->shave_cut = $session_data->shave_cut;
            $appointment->beard_trim = $session_data->beard_trim;
            $appointment->kids_cut = $session_data->kids_cut;
            $appointment->price = $session_data->total_price;
            $appointment->bookdate = $session_data->request_date.' '.$session_data->request_time;
            $appointment->status = 1;
            $appointment->destination = '0.0,0.0';
            $appointment->customer_rating = 0;
            $appointment->barber_rating = 0;
            $appointment->remark = $session_data->remarks;
            $appointment->address = $session_data->house_unit_no.' '.$session_data->address.' '.$session_data->postcode.' '.$session_data->city;
            $appointment->save();

            $request->session()->regenerate();

            return redirect('booking/status/'.$session_data->session_id);
        }

        return redirect('booking/payment/'.$session_data->session_id)->withErrors(['Payment failed']);
    }
}
