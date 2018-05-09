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
    public function __construct() {
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithPaypal($id) {
        //return view('paywithpaypal');
        $session_data = SessionBooking::where('session_id', '=', $id)->first();
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
                \Session::put('error', 'Connection timeout');
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
            \Session::put('error', 'Payment failed');
            return redirect('booking/payment/'.$session_data->session_id);
        }
        $payment = Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success');
            $appointment = new Appointment();
            $appointment->barber_id = 0;
            $appointment->customer_id = $session_data->customer_id;
            $appointment->barbercut = $session_data->senior_cut;
            $appointment->stylishcut = $session_data->junior_cut;
            $appointment->longcut = 0;
            $appointment->beardtrim = $session_data->beard_trim;
            $appointment->kidscut = $session_data->kids_cut;
            $appointment->price = $session_data->total_price;
            $appointment->bookdate = $session_data->date.' '.$session_data->time;
            $appointment->status = 1;
            $appointment->destination = '0.0,0.0';
            $appointment->customer_rating = 0;
            $appointment->barber_rating = 0;
            $appointment->remark = $session_data->remarks;
            $appointment->address = $session_data->address;
            $appointment->save();
            return redirect('booking/status/'.$session_data->session_id);
        }

        \Session::put('error', 'Payment failed');
        return redirect('booking/payment/'.$session_data->session_id);
    }
}