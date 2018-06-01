<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Apply;
use App\Models\Barber;
use App\User;
use App\Models\Subscribers;

class ApplyController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo('<pre>');
        //print_r($request->all());
        //echo('</pre>');

        $first_name = $request->input('first_name');
        // $last_name = $request->input('last_name');
        $email = $request->input('email');
        // $password = $request->input('password');
        // $country_code = $request->input('country_code');
        $phone = $request->input('phone');
        $city = $request->input('city');
        $pin_code = $request->input('pin_code');
        $description = $request->input('description');
        $certificate = $request->input('certificate');
        $experience = $request->input('experience');

        /*
        $barber_cut = $request->input('barber_cut');
        $price1 = $request->input('price1');
        $stylish_cut = $request->input('stylish_cut');
        $price2 = $request->input('price2');
        $long_cut = $request->input('long_cut');
        $price3 = $request->input('price3');
        $beard_trim = $request->input('beard_trim');
        $price4 = $request->input('price4');
        $kids_cut = $request->input('kids_cut');
        $price5 = $request->input('price5');
        */
        $count = Barber::where('email', $email)->count();
        if ( $count > 0 ){
            return redirect('/become-our-barber')->with(
                'duplicate',
                'Sorry, your email address is already send for registration.'
            );
        }

        $barber = new Barber();
        $barber->api_token = md5(rand().date('l jS \of F Y h:i:s A'));
        $barber->email = $email;
        $barber->firstname = $first_name;
        // $barber->lastname = $last_name;
        // $barber->password = $password;
        $barber->phone = $phone;
        $barber->city = $city;
        $barber->pincode = $pin_code;
        $barber->description = $description;
        $barber->certificate = $certificate;
        $barber->experience = $experience;

        $file = $request->file('client_photo');
        if ($file) {
            $url = md5(rand().date('l jS \of F Y h:i:s A')).'.jpg';
            $file->move('upload/barber/profile/'.$barber->id, $url);
            $barber->profileimg = $url;
        }
        $barber->save();

        \App\User::create([
            // 'name' => $last_name.' '.$first_name,
            'name' => $first_name,
            'email' => $email,
            // 'password' => bcrypt($password),
            'role' => 1,    //barber
        ]);

        //return redirect('/');
        return redirect('/thank-you')->with(
            'message',
            'Thank you. Your request has been sent successfully. MyCut will review your information and arrange for interview session if you get shortlisted.'
        );
    }

    public function subscribeNew(Request $request) {
        $email = $request['email'];

        $subscriber = Subscribers::where('email', '=', $email)->first();
        if ($subscriber) {
            return response('Thanks. You already subscribe us!');
        }

        Subscribers::create([
            'email' => $email,
        ]);
        return response('Thanks for subscribe us.');
    }
}
