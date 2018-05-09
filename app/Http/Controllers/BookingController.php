<?php

namespace App\Http\Controllers;

use App\Models\SessionBooking;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Twilio;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;
use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Log;
use App\User;
use Session;

class BookingController extends Controller {
    public function index(Request $request)
    {
        $session_data = SessionBooking::where('session_id', '=', $request->session()->getId())->first();
        return view('booking', [
            'session_data' => $session_data
        ]);
    }

    public function report(Exception $e)
    {
        $this->_notifyThroughSms($e);
        return parent::report($e);
    }

    public function render($request, Exception $e)
    {
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }

        return parent::render($request, $e);
    }

    private function _notifyThroughSms($e)
    {
        foreach ($this->_notificationRecipients() as $recipient) {
            $this->_sendSms(
                $recipient->phone_number,
                '[This is a test] It appears the server' .
                ' is having issues. Exception: ' . $e->getMessage() .
                ' Go to http://newrelic.com for more details.'
            );
        }
    }

    private function _notificationRecipients()
    {
        $adminsFile = base_path() .
            DIRECTORY_SEPARATOR .
            'config' . DIRECTORY_SEPARATOR .
            'administrators.json';
        try {
            $adminsFileContents = \File::get($adminsFile);

            return json_decode($adminsFileContents);
        } catch (FileNotFoundException $e) {
            Log::error(
                'Could not find ' .
                $adminsFile .
                ' to notify admins through SMS'
            );
            return [];
        }
    }

    public function verifyPhone(Request $request)
    {
        $phoneNo = $request['phoneNo'];
        //$phoneNo = '+8613039082005';
        $TWILIO_SID = 'ACbbfb5824ac1b51fb4378bfb4a6b70c03';
        $TWILIO_TOKEN = 'a79e790781552d93663b4f47dc395981';
        $TWILIO_SENDERPHONE = '+1 267-331-4820';
        $verify_code = rand(1000, 9999);
        $message = 'Your Mycut verification code is: '.$verify_code;
        $request->session()->set('phone', $verify_code);
        $request->session()->set('title', $request['title']);
        $request->session()->set('name', $request['name']);
        $request->session()->set('email', $request['email']);

        /*
        if (Auth::guest()) {
            return response('This is guest');
        }
        */

        $client = new Twilio\Rest\Client($TWILIO_SID, $TWILIO_TOKEN);
        try {
            $client->messages->create(
                $phoneNo,
                [
                    "body" => $message,
                    "from" => $TWILIO_SENDERPHONE
                    //   On US phone numbers, you could send an image as well!
                    //  'mediaUrl' => $imageUrl
                ]
            );
            Log::info('Message sent to ' . $TWILIO_SENDERPHONE);
        } catch (TwilioException $e) {
            Log::error(
                'Could not send SMS notification.' .
                ' Twilio replied with: ' . $e
            );
        }
        return response($request->session()->getId());
    }

    public function verifyCode(Request $request) {
        $phoneNo = $request['phoneNo'];
        $verify_code = $request['verifyCode'];
        $session_code = $request->session()->get('phone');
        //Session::forget('phone');
        if ($verify_code == $session_code) {
            $session_data = SessionBooking::where('session_id', '=', $request->session()->getId())->first();
            if (!$session_data) {
                $session_data = SessionBooking::create([
                    'session_id' => $request->session()->getId(),
                ]);
            }
            $session_data->contact_title = $request->session()->get('title');
            $session_data->name = $request->session()->get('name');
            $session_data->email = $request->session()->get('email');
            $session_data->phone = $request->session()->get('phone');
            if (Auth::check()) {
                $user = Auth::user();
                $session_data->customer_id = $user->id;
            }
            $session_data->save();
            return response('1');
        }
        return response($session_code);
    }

    public function request_booking(Request $request) {
        $type_senior = $request['service-type-senior'];
        $type_junior = $request['service-type-junior'];
        $type_beard = $request['service-type-beard'];
        $type_kids = $request['service-type-kids'];
        $senior_cnt = $request['senior-count'];
        $junior_cnt = $request['junior-count'];
        $beard_cnt = $request['beard-count'];
        $kids_cnt = $request['kids-count'];
        $city = $request['city'];
        $postcode = $request['postcode'];
        $house_unit_no = $request['house-unit-no'];
        $address = $request['address'];
        $remark = $request['remark'];
        $date = $request['date'];
        $time = $request['time'];
        $total_price = $request['total-price'];
        $price = $request['price'];
        $discount = $request['discount'];

        $session_data = SessionBooking::where('session_id', '=', $request->session()->getId())->first();
        if (!$session_data) {
            $session_data = SessionBooking::create([
                'session_id' => $request->session()->getId(),
            ]);
        }
        $session_data->senior_cut = $senior_cnt;
        $session_data->junior_cut = $junior_cnt;
        $session_data->beard_trim = $beard_cnt;
        $session_data->kids_cut = $kids_cnt;
        $session_data->city = $city;
        $session_data->postcode = $postcode;
        $session_data->house_unit_no = $house_unit_no;
        $session_data->address = $address;
        $session_data->remarks = $remark;
        $session_data->request_date = $date;
        $session_data->request_time = $time;
        $session_data->total_price = $total_price;
        $session_data->price = $price;
        $session_data->discount = $discount;
        $session_data->save();

        return redirect('booking/payment/'.$session_data->session_id);
    }

    public function booking_status(Request $request, $id) {
        $session_data = SessionBooking::where('session_id', '=', $id)->first();
        return view('booking-third-step', [
            'session_data' => $session_data
        ]);
    }

    public function doLogin(Request $request) {
        $email = $request['email'];
        $password = $request['password'];

        if (Auth::check()) {
            return response('1');
        }
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return response('failed');
        } else {
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );

            if(Auth::attempt($userdata)) {
                return response('1');
            } else {
                return response('validation not successful');
            }
        }
    }

    public function doRegister(Request $request) {
        User::create([
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role' => 1,
        ]);
        if (Auth::check()) {
            return response('logged in');
        }
        return response('successed');
    }

    public function doLogout(Request $request) {
        Auth::logout();
        return response('logged out');
    }
}