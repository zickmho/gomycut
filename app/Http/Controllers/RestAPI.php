<?php
/**
 * Created by PhpStorm.
 * User: DicK Garry
 * Date: 9/18/2017
 * Time: 5:52 PM
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Input;
use Datatables;
use Response;
use Log;
use DateTime;
use DateTimeZone;
use DB;
use App\Http\Requests;
use App\Models\Barber;
use App\Models\Customer;
use App\Models\Appointment;
use App\Models\CustomerNotification;
use App\Models\BarberNotification;
use App\Models\BankAccount;
use Symfony\Component\HttpKernel\Tests\Fragment\Bar;
use Illuminate\Support\Facades\Auth;

class MyValidator{

    public static function validateAddUserRequest($input)
    {
        $messages = [
            'email.required' => 'E-Mail address is required.',
            'email.email' => 'The E-Mail must be a valid email address.',
            'email.unique' => 'E-Mail is already registered.',
            'password.required' => 'You must fill password.',
            'password.min' => 'Your password should be longer than 6 characters.'
        ];
        $rules = [
            'email' => 'required | between:3,64 | email',
            'password' => 'required | min:6'
        ];
        return Validator::make($input, $rules, $messages);
    }

    public static function validateLoginRequest($input)
    {
        $messages = [
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
        ];
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        return Validator::make($input, $rules, $messages);
    }

    public static function validateToken($input)
    {
        $messages = [
            'token.exists' => 'Invalid token.',
            'token.required' => 'Token is required.',
        ];
        $rules = [
            'token' => 'required',
        ];
        return Validator::make($input, $rules, $messages);
    }
}

class RestAPI extends Controller{

    public function barberLogin(Request $request){
        $input = $request->input();
        $v = MyValidator::validateLoginRequest($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }

        $email = isset($input['email']) ? $input['email'] : '';
        $password = isset($input['password']) ? $input['password'] : '';
        $password = md5($password);
        $barber = Barber::where('email', $email)->where('password', $password)->first();
        if (!isset($barber)) {
            $barber = Barber::where('email', $email)->first();
            if (!isset($barber)) {
                return new jsonResponse([
                    'msg' => 'User does not exist.'
                ], 201);
            } else {
                return new jsonResponse([
                    'msg' => 'Invalid password.'
                ], 201);
            }
        }
        $barber->notification_token = isset($input['notification_token']) ? $input['notification_token'] : '';;
        $barber->save();
        $price = $barber->barbercut + $barber->longcut + $barber->beardtrim + $barber->kidscut;

        return new jsonResponse([
            'barber' => $barber,
            'price' => (string)$price,
            'msg' => 'success'
        ], 201);
    }

    public function updateBarberNotificationToken(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
          return new jsonResponse([
              'msg' => $v->errors()->first(),
          ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $barber = Barber::where('api_token', $token)->first();
      $barber->notification_token = isset($input['notification_token']) ? $input['notification_token'] : '';
      $barber->save();

      return new jsonResponse([
          'msg' => 'success'
      ], 201);
    }

    public function updateCustomerNotificationToken(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
          return new jsonResponse([
              'msg' => $v->errors()->first(),
          ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $customer = Customer::where('api_token', $token)->first();
      $customer->notification_token = isset($input['notification_token']) ? $input['notification_token'] : '';
      $customer->save();

      return new jsonResponse([
          'msg' => 'success'
      ], 201);
    }

    public function customerLogin(Request $request){
        $input = $request->input();
        $v = MyValidator::validateLoginRequest($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }

        $email = isset($input['email']) ? $input['email'] : '';
        $password = isset($input['password']) ? $input['password'] : '';
        $password = md5($password);
        $customer = Customer::where('email', $email)->where('password', $password)->first();
        if (!isset($customer)) {
            $customer = Customer::where('email', $email)->first();
            if (!isset($customer)) {
                return new jsonResponse([
                    'msg' => 'User does not exist.'
                ], 201);
            } else {
                return new jsonResponse([
                    'msg' => 'Invalid password.'
                ], 201);
            }
        }
        if ( $customer->verify_code != 'aaaa'){
            return new jsonResponse([
                'verify_code' => $customer->verify_code,
                'phoneNo' => $customer->phone,
                'email' => $customer->email,
                'msg' => 'verify'
            ], 201);
        }
        $customer->notification_token = isset($input['notification_token']) ? $input['notification_token'] : '';
        $customer->save();

        return new jsonResponse([
            'customer' => $customer,
            'msg' => 'success'
        ], 201);
    }

    public function verifySuccess(Request $request){
        $input = $request->input();

        $email = isset($input['email']) ? $input['email'] : '';
        $customer = Customer::where('email', $email)->first();
        $customer->verify_code = 'aaaa';
        $customer->save();

        return new jsonResponse([
            'msg' => 'success'
        ], 201);
    }

    public function addNewBarber(Request $request){
        $input = $request->input();
        $v = MyValidator::validateAddUserRequest($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }
        $inputemail = isset($input['email']) ? $input['email'] : '';
        $count = Barber::where('email', $inputemail)->count();
        if ( $count > 0 ){
            return new jsonResponse([
                'msg' => 'Email duplicated!'
            ], 201);
        }
        $barber = new Barber();
        $barber->api_token = md5(rand().date('l jS \of F Y h:i:s A'));
        $barber->email = isset($input['email']) ? $input['email'] : '';
        $barber->firstname = isset($input['firstname']) ? $input['firstname'] : '';
        $barber->lastname = isset($input['lastname']) ? $input['lastname'] : '';
        $barber->password = isset($input['password']) ? md5($input['password']) : '';
        $barber->phone = isset($input['phone']) ? $input['phone'] : '';
        $barber->city = isset($input['city']) ? $input['city'] : '';
        $barber->pincode = isset($input['pincode']) ? $input['pincode'] : '';
        $barber->description = isset($input['description']) ? $input['description'] : '';
        $barber->certificate = isset($input['certificate']) ? $input['certificate'] : '';
        $barber->experience = isset($input['experience']) ? $input['experience'] : '';
        $barber->barbercut = isset($input['barbercutPrice']) ? $input['barbercutPrice'] : '';
        $barber->longcut = isset($input['longcutPrice']) ? $input['longcutPrice'] : '';
        $barber->beardtrim = isset($input['beardtrimPrice']) ? $input['beardtrimPrice'] : '';
        $barber->kidscut = isset($input['kidscutPrice']) ? $input['kidscutPrice'] : '';
        $barber->online_start = isset($input['online_start']) ? $input['online_start'] : '';
        $barber->online_end = isset($input['online_end']) ? $input['online_end'] : '';
        $barber->save();
        $file = $request->file('uploadfile');
        $url = md5(rand().date('l jS \of F Y h:i:s A')).'.jpg';
        $file->move('upload/barber/profile/'.$barber->id, $url);
        $barber->profileimg = $url;
        $result = $barber->save();

        \App\User::create([
            'name' => $input['lastname'].' '.$input['firstname'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'role' => 1,    //barber
        ]);

        if (isset($result)) {
            return new jsonResponse([
                'profile' => $url,
                'msg' => 'success'
            ], 201);
        } else {
            return new jsonResponse([
                'msg' => 'Data not acceptable.'
            ], 201);
        }
    }

    public function uploadPortifolio(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $barber = Barber::where('api_token', $token)->first();
        $file = $request->file('uploadfile');
        $url = md5(rand().date('l jS \of F Y h:i:s A')).'.jpg';
        $file->move('upload/barber/portifolio/'.$barber->id, $url);
        if ( $barber->portifolios != ''){
            $barber->portifolios = $barber->portifolios."/".$url;
        }else{
            $barber->portifolios = $url;
        }
        $result = $barber->save();
        return new jsonResponse([
            'portifolios' => $barber->portifolios,
            'msg' => 'success'
        ], 201);
    }

    public function uploadFavourite(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
          return new jsonResponse([
              'msg' => $v->errors()->first(),
          ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $customer = Customer::where('api_token', $token)->first();
      $favourite = isset($input['favourite']) ? $input['favourite'] : '';
      $id = isset($input['id']) ? $input['id'] : '';
      if ( $favourite == "false"){
        if ( $customer->favourite != ''){
            $customer->favourite = $customer->favourite."/".$id;
        }else{
            $customer->favourite = $id;
        }
      }else if ( $favourite == "true"){
            $favouriteArr = explode("/", $customer->favourite);
            foreach ($favouriteArr as $favouriteStr) {
              $customer->favourite = '';
              if ( $favouriteStr != $id){
                if ( $customer->favourite != ''){
                    $customer->favourite = $customer->favourite."/".$favouriteStr;
                }else{
                    $customer->favourite = $favouriteStr;
                }
              }
            }
      }
      $customer->save();
      return new jsonResponse([
          'favourite' => $customer->favourite,
          'msg' => 'success'
      ], 201);
    }

    public function addNewCustomer(Request $request){
        $input = $request->input();
        $v = MyValidator::validateAddUserRequest($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }
        $inputemail = isset($input['email']) ? $input['email'] : '';
        $count = Customer::where('email', $inputemail)->count();
        if ( $count > 0 ){
            return new jsonResponse([
                'msg' => 'Email Duplicated!'
            ], 201);
        }
        $customer = new Customer();
        $customer->api_token = md5(rand().date('l jS \of F Y h:i:s A'));
        $customer->email = $inputemail;
        $customer->password = isset($input['password']) ? md5($input['password']) : '';
        $customer->phone = isset($input['phone']) ? $input['phone'] : '';
        $customer->verify_code = rand(1000, 9999);
        $customer->save();
        $file = $request->file('uploadfile');
        $url = md5(rand().date('l jS \of F Y h:i:s A')).'.jpg';
        $file->move('upload/user/profile/'.$customer->id, $url);
        $customer->profileimg = $url;
        $result = $customer->save();

        \App\User::create([
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'role' => 2,    //customer
        ]);

        if (isset($result)) {
            return new jsonResponse([
                'profile' => $url,
                'verify_code' => $customer->verify_code,
                'msg' => 'success'
            ], 201);
        } else {
            return new jsonResponse([
                'msg' => 'Data not acceptable.'
            ], 201);
        }
    }

    public function getBriefStatisticsForBarber(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
          return new jsonResponse([
              'msg' => $v->errors()->first(),
          ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $barber = Barber::where('api_token', $token)->first();

      $online = $barber->online;

      $year = new DateTime();
      $year->setDate($year->format('Y'), 1, 1);
      $yearprice = Appointment::where('bookdate', '>', $year)->where('status','4')->sum('price');
      if ( !isset($yearprice)){
        $yearprice = 0;
      }
      $month = new DateTime();
      $month->modify('first day of this month');
      $monthprice = Appointment::where('bookdate', '>', $month)->where('status','4')->sum('price');
      if ( !isset($monthprice)){
        $monthprice = 0;
      }
      $rating = Appointment::where('barber_id', $barber->id)->where('status', '4')->avg('customer_rating');
      if ( !isset($rating) ){
        $rating = 0;
      }
      $cancelcount = Appointment::where('barber_id', $barber->id)->where('status', '0')->count();
      $totalcount = Appointment::where('barber_id', $barber->id)->where('status', '<>', '1')->count();
      if ($totalcount != 0){
        $cancelper = (float)$cancelcount / (float)$totalcount * 100;
        $acceptper = (float)($totalcount-$cancelcount) / (float)$totalcount * 100;
      }else{
        $cancelper = 0;
        $acceptper = 0;
      }
      $notificationcount = BarberNotification::where('barber_id', $barber->id)->where('newflag', '0')->count();

      return new jsonResponse([
          'online' => (string)$online,
          'rating' => (string)$rating,
          'cancelled' => (string)$cancelper,
          'accepted' => (string)$acceptper,
          'yearprice' => (string)$yearprice,
          'monthprice' => (string)$monthprice,
          'notificationcount' => (string)$notificationcount,
          'msg' => 'success'
      ], 201);
    }

    public function setNewBarberPassword(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $barber = Barber::where('api_token', $token)->first();
        $password = isset($input['password']) ? $input['password'] : '';
        $password = md5($password);
        $barber->password = $password;
        $barber->save();
        return new jsonResponse([
            'msg' => 'success',
        ], 201);
    }

    public function getAppointmentStatus(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $id = isset($input['id']) ? $input['id'] : '';
        $barber = Barber::where('api_token', $token)->first();
        $currentappointmentid = $barber->currentappointmentid;
        $rating = Appointment::where('barber_id', $barber->id)->where('status', '4')->avg('customer_rating');
        if ( !isset($rating) ){
          $rating = 0;
        }

        $appointment = Appointment::where('id', $id)->first();
        $customer = Customer::where('id', $appointment->customer_id)->first();
        $customerimg = (string)($customer->id) . "/" . $customer->profileimg;
        return new jsonResponse([
            'customer_id' => $appointment->customer_id,
            'status' => $appointment->status,
            'customerimg' => $customerimg,
            'name' => $customer->email,
            'rating' => (string)$rating,
            'description' =>$appointment->description,
            'price' => (string)($appointment->barbercut*$barber->barbercut+$appointment->longcut*$barber->longcut+$appointment->beardtrim*$barber->beardtrim+$appointment->kidscut*$barber->kidscut),
            'destination' => $appointment->destination,
            'destination_address' => $appointment->address,
            'remark' => $appointment->remark,
            'bookdate' => $appointment['bookdate'],
            'qty' => (string)($appointment->barbercut+$appointment->longcut+$appointment->beardtrim+$appointment->kidscut),
            'msg' => 'success'
        ], 201);
    }

    public function submitBarberLocation(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);

        }
        $token = isset($input['token']) ? $input['token'] : '';
        $latitude = isset($input['latitude']) ? $input['latitude'] : '';
        $longitude = isset($input['longitude']) ? $input['longitude'] : '';

        $barber = Barber::where('api_token', $token)->first();
        $barber->latitude = $latitude;
        $barber->longitude = $longitude;
        $barber->save();
        return new jsonResponse([
            'msg' => 'success'
        ], 201);
    }

    public function updateOnlineStatus(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);

        }
        $token = isset($input['token']) ? $input['token'] : '';
        $barber = Barber::where('api_token', $token)->first();
        if (!isset($barber)) {
            return new jsonResponse([
                'msg' => 'User does not exist.'
            ], 201);
        }
        $barber->online = isset($input['online']) ? $input['online'] : '';
        $barber->save();
        return new jsonResponse([
            'msg' => 'success'
        ], 201);
    }

    public function getBarberList(Request $request){
        $input = $request->input();
        $token = isset($input['token']) ? $input['token'] : '';
        $customer = Customer::where('api_token', $token)->first();

        $barbers = Barber::orderBy('online', 'DESC')->get();
        $ret = array();
        foreach ( $barbers as $barber ){
            $rating = Appointment::where('barber_id', $barber->id)->where('customer_review_flag', '1')->avg('customer_rating');
            if ( !isset($rating) ){
              $rating = 0;
            }
            $requestCount = Appointment::where('barber_id', $barber->id)->where('customer_id', $customer->id)->where('status', '1')->count();
            $acceptCount = Appointment::where('barber_id', $barber->id)->where('customer_id', $customer->id)->where('status', '2')->count();
            $allow = "true";
            if ( $requestCount+$acceptCount >= 1 ){
              $allow = "false";
            }
            array_push($ret, array(
                'id' => $barber->id,
                'firstname' => $barber->firstname,
                'lastname' => $barber->lastname,
                'phone' => $barber->phone,
                'description' => $barber->description,
                'certificate' => $barber->certificate,
                'experience' => $barber->experience,
                'profileimg' => $barber->profileimg,
                'latitude' => $barber->latitude,
                'longitude' => $barber->longitude,
                'barbercut' => $barber->barbercut,
                'longcut' => $barber->longcut,
                'beardtrim' => $barber->beardtrim,
                'kidscut' => $barber->kidscut,
                'online' => $barber->online,
                'online_start' => $barber->online_start,
                'online_end' => $barber->online_end,
                'portifolios' => $barber->portifolios,
                'rating' => $rating,
                'allow' => $allow
            ));
        }

        $status = 0;
        $appointment = Appointment::where('status',  '1')->orWhere('status', '2')->first();
        if ( isset($appointment)){
            $status = $appointment->status;
        }else{
            $appointment = Appointment::where('status', '3')->where('customer_review_flag', '0')->first();
            if ( isset($appointment) ){
                $status = $appointment->status;
            }
        }
        $notifications = CustomerNotification::where('customer_id', $customer->id)->where('newflag', '0')->get();
        $notificationcount = CustomerNotification::where('customer_id', $customer->id)->where('newflag', '0')->count();

        return new jsonResponse([
            'data' => $ret,
            'status' => (string)$status,
            'notificationcount' => (string)$notificationcount,
            'msg' => 'success'
        ], 201);
    }

    public function getAllBarbers(Request $request){
        $input = $request->input();
        $token = isset($input['token']) ? $input['token'] : '';
        $customer = Customer::where('api_token', $token)->first();

        $barbers = Barber::get();
        $ret = array();
        foreach ( $barbers as $barber){
          $rating = Appointment::where('barber_id', $barber->id)->where('status', '4')->avg('customer_rating');
          if ( !isset($rating) ){
            $rating = 0;
          }
          $requestCount = Appointment::where('barber_id', $barber->id)->where('customer_id', $customer->id)->where('status', '1')->count();
          $acceptCount = Appointment::where('barber_id', $barber->id)->where('customer_id', $customer->id)->where('status', '2')->count();
          $allow = "true";
          if ( $requestCount+$acceptCount >= 1 ){
            $allow = "false";
          }
            array_push($ret, array(
                'id' => $barber->id,
                'firstname' => $barber->firstname,
                'lastname' => $barber->lastname,
                'phone' => $barber->phone,
                'description' => $barber->description,
                'certificate' => $barber->certificate,
                'experience' => $barber->experience,
                'profileimg' => $barber->profileimg,
                'online' => $barber->online,
                'online_start' => $barber->online_start,
                'online_end' => $barber->online_end,
                'rating' => $rating,
                'latitude' => $barber->latitude,
                'longitude' => $barber->longitude,
                'barbercut' => $barber->barbercut,
                'longcut' => $barber->longcut,
                'beardtrim' => $barber->beardtrim,
                'kidscut' => $barber->kidscut,
                'portifolios' => $barber->portifolios,
                'allow' => $allow
            ));
        }

        $status = 0;
        $appointment = Appointment::where('status',  '1')->orWhere('status', '2')->first();
        if ( isset($appointment)){
            $status = $appointment->status;
        }else{
            $appointment = Appointment::where('status', '3')->where('customer_review_flag', '0')->first();
            if ( isset($appointment) ){
                $status = $appointment->status;
            }
        }

        return new jsonResponse([
            'data' => $ret,
            'status' => $status,
            'msg' => 'success'
        ], 201);
    }

    public function bookAppointment(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $customer = Customer::where('api_token', $token)->first();
        $barberid = isset($input['barberid']) ? $input['barberid'] : '';
        $barber = Barber::where('id', $barberid)->first();
        $appointment = new Appointment();
        $appointment->barber_id = $barberid;
        $appointment->customer_id = $customer->id;
        $appointment->barbercut = isset($input['barber']) ? $input['barber'] : '';
        $appointment->longcut = isset($input['long']) ? $input['long'] : '';
        $appointment->beardtrim = isset($input['beard']) ? $input['beard'] : '';
        $appointment->kidscut = isset($input['kids']) ? $input['kids'] : '';
        $appointment->bookdate = isset($input['date']) ? $input['date'] : '';
        $appointment->description = isset($input['description']) ? $input['description'] : '';
        $appointment->remark = isset($input['remark']) ? $input['remark'] : '';
        $appointment->address = isset($input['address']) ? $input['address'] : '';
        $appointment->destination = isset($input['destination']) ? $input['destination'] : '';
        $appointment->price = isset($input['price']) ? $input['price'] : '';
        $appointment->save();
        Log::info('appointment:'.$appointment);
        //if ( $appointment->id == 1){
          $appointment->id = $appointment->id + 102457;
          $appointment->save();
        //}

        $customer->currentappointmentid = $appointment->id;
        $customer->save();
        $barber->currentappointmentid = $appointment->id;
        $barber->save();

        $content = $customer->email.' requested appointment with you. Please check it.';
        $barbernotification = new BarberNotification();
        $barbernotification->title = "Appointment booked!";
        $barbernotification->content = $content;
        $barbernotification->type = "book";
        $barbernotification->barber_id = $barber->id;
        $barbernotification->save();
        $this->send_fcm($barber->notification_token, array("id" => $appointment->id, "title" =>"Appointment booked!", "content" =>$content, "type"=>"book", "notificationid"=>$barbernotification->id));

        return new jsonResponse([
            'id' => (string)$appointment->id,
            'msg' => 'success'
        ], 201);
    }

    public function loadBarberStatus(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $id = isset($input['id']) ? $input['id'] : '';
        $customer = Customer::where('api_token', $token)->first();

        $appointment = Appointment::where('id', $id)->first();
        if ( !isset($appointment)){
            return new jsonResponse([
                'msg' => 'no appointment'
            ], 201);
        }

        $barber = Barber::where('id', $appointment->barber_id)->first();
        if ( !isset($barber)){
            return new jsonResponse([
                'msg' => 'no appointment'
            ], 201);
        }
        $rating = Appointment::where('barber_id', $barber->id)->where('status', '4')->avg('customer_rating');
        if ( !isset($rating) ){
          $rating = 0;
        }
          $barberret = array(
              'id' => $barber->id,
              'firstname' => $barber->firstname,
              'lastname' => $barber->lastname,
              'phone' => $barber->phone,
              'description' => $barber->description,
              'certificate' => $barber->certificate,
              'experience' => $barber->experience,
              'profileimg' => $barber->profileimg,
              'online' => $barber->online,
              'online_start' => $barber->online_start,
              'online_end' => $barber->online_end,
              'rating' => $rating,
              'latitude' => $barber->latitude,
              'longitude' => $barber->longitude,
              'barbercut' => $barber->barbercut,
              'longcut' => $barber->longcut,
              'beardtrim' => $barber->beardtrim,
              'kidscut' => $barber->kidscut
          );
          $appointment1 = $appointment;
          if ( $appointment->status == 3 && $appointment->customer_review_flag == 1 ){
            $appointment1->status = 4;
            //$appointment1->save();
          }

        return new jsonResponse([
            'barber' => $barberret,
            'appointment' => $appointment1,
            'msg' => 'success'
        ], 201);
    }

    public function acceptAppointment(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
          return new jsonResponse([
              'msg' => $v->errors()->first()
          ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $id = isset($input['id']) ? $input['id'] : '';
      $barber = Barber::where('api_token', $token)->first();
      $appointment = Appointment::where('id', $id)->first();
      $appointment->status = 2;
      $appointment->save();

      $customer = Customer::where('id', $appointment->customer_id)->first();
      $content = "Your Appointment accepted by ".$barber->firstname.' '.$barber->lastname.". Please wait until barber arrive.";
      $customernotification = new CustomerNotification();
      $customernotification->title = "Appointment accepted!";
      $customernotification->content = $content;
      $customernotification->type = "accept";
      $customernotification->customer_id = $customer->id;
      $customernotification->save();
      $this->send_fcm($customer->notification_token, array("id" => $appointment->id, "title" =>"Appointment accepted!", "content" =>$content, "type"=>"accept", "notificationid"=>$customernotification->id));

      return new jsonResponse([
          'msg' => 'success',
      ], 201);
    }

    public function rejectAppointment(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
          return new jsonResponse([
              'msg' => $v->errors()->first()
          ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $id = isset($input['id']) ? $input['id'] : '';
      $barber = Barber::where('api_token', $token)->first();
      $appointment = Appointment::where('id', $id)->first();
      $appointment->status = 0;
      $appointment->save();

      $content = "Your Appointment rejected by ".$barber->email;
      $customernotification = new CustomerNotification();
      $customernotification->title = "Appointment rejected!";
      $customernotification->content = $content;
      $customernotification->type = "reject";
      $customernotification->customer_id = $customer->id;
      $customernotification->save();
      $this->send_fcm($customer->notification_token, array("id" => $appointment->id, "title" =>"Appointment rejected!", "content" =>$content, "type"=>"reject", "notificationid"=>$customernotification->id));

      return new jsonResponse([
          'msg' => 'success',
      ], 201);
    }

    public function getAppointmentsList(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $customer = Customer::where('api_token', $token)->first();

        $appointments = Appointment::where('customer_id', $customer->id)->get();
        $malTZ = new DateTimeZone("Asia/Kuala_Lumpur");
        $ret = array();
        foreach ($appointments as $appointment){
            $barber = Barber::where('id', $appointment->barber_id)->first();
            $status = $appointment->status;
            if ( $appointment->status == 3 && $appointment->customer_review_flag == 1){
              $status = 4;
            }
            array_push($ret, array(
                'id' => $appointment->id,
                'barbername' => $barber->firstname . ' ' . $barber->lastname,
                'barberimg' => $barber->id.'/'.$barber->profileimg,
                'bookdate' => date_format(new DateTime($appointment['bookdate']), "M d - h:i a"),
                'description' => $appointment->description,
                'status' => (string)$status,
                'remark' => (string)$appointment->remark,
                'price' => (string)$appointment->price
            ));
        }

        return new jsonResponse([
            'msg' => 'success',
            'data' => $ret
        ], 201);
    }

    public function getAppointmentsByBarberList(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first(),
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $barber = Barber::where('api_token', $token)->first();

        $appointments = Appointment::where('barber_id', $barber->id)->get();
        $malTZ = new DateTimeZone("Asia/Kuala_Lumpur");
        $ret = array();
        foreach ($appointments as $appointment){
            $customer = Customer::where('id', $appointment->customer_id)->first();
            $status = $appointment->status;
            if ( $appointment->status == 3 && $appointment->barber_review_flag == 1){
              $status = 4;
            }
            array_push($ret, array(
                'id' => $appointment->id,
                'customername' => $customer->email,
                'customerimg' => $customer->id.'/'.$customer->profileimg,
                'bookdate' => date_format(new DateTime($appointment->bookdate), "M d - h:i a"),
                'description' => $appointment->description,
                'status' => (string)$status,
                'remark' => (string)$appointment->remark,
                'price' => (string)$appointment->price
            ));
        }

        return new jsonResponse([
            'msg' => 'success',
            'data' => $ret
        ], 201);
    }

    public function getReviews(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first()
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $barber = Barber::where('api_token', $token)->first();
        $appointments = Appointment::where('barber_id', $barber->id)->where('customer_review_flag', '1')->get();
        $malTZ = new DateTimeZone("Asia/Kuala_Lumpur");
        $ret = array();
        foreach ( $appointments as $appointment ){
            $customer = Customer::where('id', $appointment->customer_id)->first();
            array_push($ret, array(
                'profileimg' => $customer->profileimg,
                'customerid' => $customer->id,
                'email' => $customer->email,
                'date' => date_format(new DateTime($appointment->bookdate), "M d - h:i a"),
                'rating' => $appointment->customer_rating,
                'review' => $appointment->customer_review
            ));
        }

        return new jsonResponse([
            'data' => $ret,
            'msg' => 'success',
        ], 201);
    }

    public function cancelByBarber(Request $request){
    	$input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first()
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $barber = Barber::where('api_token', $token)->first();
    		$appointment = Appointment::where('barber_id', $barber->id)->first();
    		$customer = Customer::where('id', $appointment->customer_id)->first();
    		$barber->currentappointmentid = 0;
    		$customer->currentappointmentid = 0;
    		$appointment->status = 0;
    		$appointment->save();
    		$barber->save();
    		$customer->save();

        $content = "Your Appointment cancelled by ".$barber->firstname.' '.$barber->lastname;
        $customernotification = new CustomerNotification();
        $customernotification->title = "Appointment cancelled!";
        $customernotification->content = $content;
        $customernotification->type = "cancel";
        $customernotification->customer_id = $customer->id;
        $customernotification->save();
        $this->send_fcm($customer->notification_token, array("id" => $appointment->id, "title" =>"Appointment cancelled!", "content" =>$content, "type"=>"cancel", "notificationid"=>$customernotification->id));

        return new jsonResponse([
            'msg' => 'success'
        ], 201);
    }

    public function cancelByUser(Request $request){
    	  $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first()
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $id = isset($input['id']) ? $input['id'] : '';
        $customer = Customer::where('api_token', $token)->first();
    		//$appointment = Appointment::where('customer_id', $customer->id)->first();
        $appointment = Appointment::where('id', $id)->first();
    		$barber = Barber::where('id', $appointment->barber_id)->first();
    		$barber->currentappointmentid = 0;
    		$customer->currentappointmentid = 0;
    		$appointment->status = 0;
    		$appointment->save();
    		$barber->save();
    		$customer->save();

        $content = "Your Appointment cancelled by ".$customer->firstname.' '.$customer->lastname;
        $barbernotification = new BarberNotification();
        $barbernotification->title = "Appointment cancelled!";
        $barbernotification->content = $content;
        $barbernotification->type = "cancel";
        $barbernotification->barber_id = $barber->id;
        $barbernotification->save();
        $this->send_fcm($barber->notification_token, array("id" => $appointment->id, "title" =>"Appointment cancelled!", "content" =>$content, "type"=>"cancel", "notificationid"=>$barbernotification->id));

        return new jsonResponse([
            'msg' => 'success'
        ], 201);
    }

    public function noshowBook(Request $request){
    	  $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first()
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $id = isset($input['id']) ? $input['id'] : '';
        $customer = Customer::where('api_token', $token)->first();
    		//$appointment = Appointment::where('customer_id', $customer->id)->first();
        $appointment = Appointment::where('id', $id)->first();
    		$barber = Barber::where('id', $appointment->barber_id)->first();
    		$barber->currentappointmentid = 0;
    		$customer->currentappointmentid = 0;
    		$appointment->status = 5;
    		$appointment->save();
    		$barber->save();
    		$customer->save();

        $content = "Your Appointment cancelled by ".$customer->email;
        $barbernotification = new BarberNotification();
        $barbernotification->title = "Appointment cancelled!";
        $barbernotification->content = $content;
        $barbernotification->type = "noshow";
        $barbernotification->barber_id = $barber->id;
        $barbernotification->save();
        $this->send_fcm($barber->notification_token, array("id" => $appointment->id, "title" =>"Appointment cancelled!", "content" =>$content, "type"=>"noshow", "notificationid"=>$barbernotification->id));

        return new jsonResponse([
            'msg' => 'success'
        ], 201);
    }

    public function completeBook(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
          return new jsonResponse([
              'msg' => $v->errors()->first()
          ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $id = isset($input['id']) ? $input['id'] : '';
      $customer = Customer::where('api_token', $token)->first();
      //$appointment = Appointment::where('customer_id', $customer->id)->where('status','2')->first();
      $appointment = Appointment::where('id', $id)->first();
      $appointment->status = 3;
      $appointment->save();

      $content = "Your Appointment completed by ".$customer->email.". Please leave a review.";
      $barber = Barber::where('id', $appointment->barber_id)->first();
      $customernotification = new CustomerNotification();
      $customernotification->title = "Appointment Completed!";
      $customernotification->content = $content;
      $customernotification->type = "complete";
      $customernotification->customer_id = $customer->id;
      $customernotification->save();
      $this->send_fcm($barber->notification_token, array("id" => $appointment->id, "title" =>"Appointment Completed!", "content" =>$content, "type"=>"complete", "notificationid"=>$customernotification->id));

      return new jsonResponse([
          'msg' => 'success'
      ], 201);
    }

    public function submitCustomerReview(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
          return new jsonResponse([
              'msg' => $v->errors()->first()
          ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $customer = Customer::where('api_token', $token)->first();
        $appointment = Appointment::where('customer_id', $customer->id)->where('status','3')->first();
        $appointment->customer_review = isset($input['review']) ? $input['review'] : '';
        $appointment->customer_rating = isset($input['rating']) ? $input['rating'] : '';
        $appointment->customer_review_flag = 1;
        $appointment->save();

        if ( $appointment->customer_review_flag == 1 && $appointment->barber_review_flag == 1){
          $appointment->status = 4;
          $appointment->save();
        }

        $customer->currentappointmentid = 0;
        $customer->save();

        return new jsonResponse([
            'msg' => 'success'
        ], 201);
    }

    public function submitBarberReview(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
          return new jsonResponse([
              'msg' => $v->errors()->first()
          ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $id = isset($input['id']) ? $input['id'] : '';
        $barber = Barber::where('api_token', $token)->first();
        $appointment = Appointment::where('id', $id)->where('status','3')->first();
        $appointment->barber_review = isset($input['review']) ? $input['review'] : '';
        $appointment->barber_rating = isset($input['rating']) ? $input['rating'] : '';
        $appointment->barber_review_flag = 1;
        $appointment->save();

        if ( $appointment->customer_review_flag == 1 && $appointment->barber_review_flag == 1){
          $appointment->status = 4;
          $appointment->save();
        }

        $barber->currentappointmentid = 0;
        $barber->save();

        return new jsonResponse([
            'msg' => 'success'
        ], 201);
    }

    private function calculateDistance($latitude, $longitude, $latitude1, $longitude1){
        $radiusOfEarth = 6371000;
        $diffLatitude = $latitude - $latitude1;
        $diffLongitude = $longitude - $longitude1;
        $a = sin($diffLatitude / 2) * sin($diffLatitude / 2) +
            cos($latitude) * cos($latitude1) *
            sin($diffLongitude / 2) * sin($diffLongitude / 2);
        $c = 2 * asin(sqrt($a));
        $distance = $radiusOfEarth * $c / 1000;
        return $distance;
    }

    private function send_fcm($android_ary, $gcmarr){
      	if(count($android_ary) == 0) {
      		return -1;
      	}
        /*------------Send 	to FCM Server-----------*/
        	try {

          		$headers = array(
          			'Content-Type: application/json',
          			'Authorization: key=AIzaSyDW607i7WLn2ns9yXfirVWymSjj8R_N6wI'
          		);

          		$fields = array(
          			'to' => $android_ary,
          			'data' => $gcmarr
          		);

          		$ch = curl_init();
          		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
          		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          		curl_setopt($ch, CURLOPT_POST, true);
          		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          		curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($fields));
          		$response = curl_exec($ch);
          		$json_result = json_decode($response);
          		curl_close($ch);
          	  return $json_result ? $json_result->failure : -1;
          }
        	catch (Exception $e) {
        		  return -1;
        	}
    }

    public function getBarberNotifications(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
        return new jsonResponse([
            'msg' => $v->errors()->first()
        ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $barber = Barber::where('api_token', $token)->first();

      $notifications = BarberNotification::where('barber_id', $barber->id)->get();
      $malTZ = new DateTimeZone("Asia/Kuala_Lumpur");
      $ret = array();
      foreach ( $notifications as $notification){
        array_push($ret, array(
            'id' => $notification->id,
            'title' => $notification->title,
            'content' => $notification->content,
            'type' => $notification->type,
            'date' => date_format(new DateTime($notification['created_at'], $malTZ), "M d - h:m a")
        ));
      }
      return new jsonResponse([
          'data' => $ret,
          'msg' => 'success'
      ], 201);
    }

    public function getCustomerNotifications(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
        return new jsonResponse([
            'msg' => $v->errors()->first()
        ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $customer = Customer::where('api_token', $token)->first();

      $notifications = CustomerNotification::where('customer_id', $customer->id)->get();
      $malTZ = new DateTimeZone("Asia/Kuala_Lumpur");
      $ret = array();
      foreach ( $notifications as $notification){
        array_push($ret, array(
            'id' => $notification->id,
            'title' => $notification->title,
            'content' => $notification->content,
            'type' => $notification->type,
            'date' => date_format(new DateTime($notification['created_at'], $malTZ), "M d - h:m a")
        ));
      }
      return new jsonResponse([
          'data' => $ret,
          'msg' => 'success'
      ], 201);
    }

    public function deleteBarberNotification(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
        return new jsonResponse([
            'msg' => $v->errors()->first()
        ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $barber = Barber::where('api_token', $token)->first();

      $id = isset($input['id']) ? $input['id'] : '';
      $appointment = BarberNotification::where('id', $id)->first();
      $appointment->delete();

      $notifications = BarberNotification::where('barber_id', $barber->id)->get();
      $malTZ = new DateTimeZone("Asia/Kuala_Lumpur");
      $ret = array();
      foreach ( $notifications as $notification){
        array_push($ret, array(
            'id' => $notification->id,
            'title' => $notification->title,
            'content' => $notification->content,
            'type' => $notification->type,
            'date' => date_format(new DateTime($notification['created_at'], $malTZ), "M d - h:m a"),
        ));
      }

      return new jsonResponse([
          'data' => $ret,
          'msg' => 'success'
      ], 201);
    }

    public function deleteCustomerNotification(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
        return new jsonResponse([
            'msg' => $v->errors()->first()
        ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $customer = Customer::where('api_token', $token)->first();

      $id = isset($input['id']) ? $input['id'] : '';
      $appointment = CustomerNotification::where('id', $id)->first();
      $appointment->delete();

      $notifications = CustomerNotification::where('customer_id', $customer->id)->get();
      $malTZ = new DateTimeZone("Asia/Kuala_Lumpur");
      $ret = array();
      foreach ( $notifications as $notification){
        array_push($ret, array(
            'id' => $notification->id,
            'title' => $notification->title,
            'content' => $notification->content,
            'type' => $notification->type,
            'date' => date_format(new DateTime($notification['created_at'], $malTZ), "M d - h:m a"),
        ));
      }

      return new jsonResponse([
          'data' => $ret,
          'msg' => 'success'
      ], 201);
    }

    public function readCustomerNotification(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
          return new jsonResponse([
              'msg' => $v->errors()->first()
          ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $id = isset($input['id']) ? $input['id'] : '';
        $customer = Customer::where('api_token', $token)->first();
        $customernotification = CustomerNotification::where('id', $id)->first();
        $customernotification->newflag = 1;
        $customernotification->save();

        $notificationcount = CustomerNotification::where('customer_id', $customer->id)->where('newflag', '0')->count();
        return new jsonResponse([
            'notificationcount' => $notificationcount,
            'msg' => 'success'
        ], 201);
    }

    public function readBarberNotification(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
          return new jsonResponse([
              'msg' => $v->errors()->first()
          ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $id = isset($input['id']) ? $input['id'] : '';
        $barber = Barber::where('api_token', $token)->first();
        $barbernotification = BarberNotification::where('barber_id', $barber->id)->first();
        $barbernotification->newflag = 1;
        $barbernotification->save();

        $notificationcount = BarberNotification::where('barber_id', $barber->id)->where('newflag', '0')->count();
        return new jsonResponse([
            'notificationcount' => $notificationcount,
            'msg' => 'success'
        ], 201);
    }

    public function getBarberRating(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
          return new jsonResponse([
              'msg' => $v->errors()->first()
          ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $barber = Barber::where('api_token', $token)->first();

        $rating = Appointment::where('barber_id', $barber->id)->where('customer_review_flag', '1')->avg('customer_rating');
        if ( !isset($rating) ){
            $rating = 0;
        }

        return new jsonResponse([
            'rating' => (string)$rating,
            'msg' => 'success'
        ], 201);
    }

    public function saveBarberPayment(Request $request){
      $input = $request->input();
      $v = MyValidator::validateToken($input);
      if ($v->fails())
      {
        return new jsonResponse([
            'msg' => $v->errors()->first()
        ], 201);
      }
      $token = isset($input['token']) ? $input['token'] : '';
      $barber = Barber::where('api_token', $token)->first();

      if ( $barber->bankaccount == 0 ){
          $bankaccount = new BankAccount();
          $bankaccount->barber_id = $barber->id;
          $bankaccount->name = isset($input['name']) ? $input['name'] : '';
          $bankaccount->banknumber = isset($input['banknumber']) ? $input['banknumber'] : '';
          $bankaccount->bankname = isset($input['bankname']) ? $input['bankname'] : '';
          $bankaccount->bankbranch = isset($input['bankbranch']) ? $input['bankbranch'] : '';
          $bankaccount->bankbirth = isset($input['bankbirth']) ? $input['bankbirth'] : '';
          $bankaccount->save();
          $barber->bankaccount = $bankaccount->id;
          $barber->save();
      }else{
          $bankaccount = BankAccount::where('id', $barber->bankaccount)->first();
          $bankaccount->name = isset($input['name']) ? $input['name'] : '';
          $bankaccount->banknumber = isset($input['banknumber']) ? $input['banknumber'] : '';
          $bankaccount->bankname = isset($input['bankname']) ? $input['bankname'] : '';
          $bankaccount->bankbranch = isset($input['bankbranch']) ? $input['bankbranch'] : '';
          $bankaccount->bankbirth = isset($input['bankbirth']) ? $input['bankbirth'] : '';
          $bankaccount->save();
      }
      return new jsonResponse([
          'id' => (string)$bankaccount->id,
          'msg' => 'success'
      ], 201);
    }

    public function getBarberPayment(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
          return new jsonResponse([
              'msg' => $v->errors()->first()
          ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $barber = Barber::where('api_token', $token)->first();
        if ( $barber->bankaccount == 0 ){
          return new jsonResponse([
              'msg' => 'noaccount'
          ], 201);
        }else{
          $bankaccount = BankAccount::where('id', $barber->bankaccount)->first();
          return new jsonResponse([
              'data' => $bankaccount,
              'msg' => 'success'
          ], 201);
        }
    }

    public function getStatistics(Request $request){
        $input = $request->input();
        $v = MyValidator::validateToken($input);
        if ($v->fails())
        {
            return new jsonResponse([
                'msg' => $v->errors()->first()
            ], 201);
        }
        $token = isset($input['token']) ? $input['token'] : '';
        $barber = Barber::where('api_token', $token)->first();
        $appointments = Appointment::where('barber_id', $barber->id)->get();
        $malTZ = new DateTimeZone("Asia/Kuala_Lumpur");
        $ret = array();
        foreach ( $appointments as $appointment ){
            array_push($ret, array(
                'date' => date_format(new DateTime($appointment->bookdate), "M/d/y"),
                'price' => $appointment->price,
                'status' => $appointment->status
            ));
        }
        return new jsonResponse([
            'data' => $ret,
            'msg' => 'success'
        ], 201);
    }
}
