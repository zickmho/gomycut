<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// ALL AUTHENTICATION ROUTES - HANDLED IN THE CONTROLLERS
Route::controllers([
	'auth' 		=> 'Auth\AuthController',
	'password' 	=> 'Auth\PasswordController',
]);

Route::group(['prefix' => '/RestAPI'], function(){
    Route::post('barberLogin', 'RestAPI@barberLogin');
    Route::post('customerLogin', 'RestAPI@customerLogin');
		Route::post('updateBarberNotificationToken', 'RestAPI@updateBarberNotificationToken');
		Route::post('updateCustomerNotificationToken', 'RestAPI@updateCustomerNotificationToken');
    Route::post('addNewBarber', 'RestAPI@addNewBarber');
    Route::post('addNewCustomer', 'RestAPI@addNewCustomer');
    Route::post('verifySuccess', 'RestAPI@verifySuccess');
    Route::post('getAppointmentStatus', 'RestAPI@getAppointmentStatus');
    Route::post('submitBarberLocation', 'RestAPI@submitBarberLocation');
    Route::post('updateOnlineStatus', 'RestAPI@updateOnlineStatus');
    Route::post('getBarberList', 'RestAPI@getBarberList');
    Route::post('getAllBarbers', 'RestAPI@getAllBarbers');
    Route::post('bookAppointment', 'RestAPI@bookAppointment');
    Route::post('loadBarberStatus', 'RestAPI@loadBarberStatus');
    Route::post('getAppointmentsList', 'RestAPI@getAppointmentsList');
    Route::post('getAppointmentsByBarberList', 'RestAPI@getAppointmentsByBarberList');
    Route::post('getReviews', 'RestAPI@getReviews');
    Route::post('cancelByUser', 'RestAPI@cancelByUser');
    Route::post('cancelByBarber', 'RestAPI@cancelByBarber');
		Route::post('completeBook', 'RestAPI@completeBook');
		Route::post('submitCustomerReview', 'RestAPI@submitCustomerReview');
		Route::post('submitBarberReview', 'RestAPI@submitBarberReview');
		Route::post('getBriefStatisticsForBarber', 'RestAPI@getBriefStatisticsForBarber');
		Route::post('acceptAppointment', 'RestAPI@acceptAppointment');
		Route::post('rejectAppointment', 'RestAPI@rejectAppointment');
		Route::post('deleteBarberNotification', 'RestAPI@deleteBarberNotification');
		Route::post('getBarberNotifications', 'RestAPI@getBarberNotifications');
		Route::post('deleteCustomerNotification', 'RestAPI@deleteCustomerNotification');
		Route::post('getCustomerNotifications', 'RestAPI@getCustomerNotifications');
		Route::post('readCustomerNotification', 'RestAPI@readCustomerNotification');
		Route::post('saveBarberPayment', 'RestAPI@saveBarberPayment');
		Route::post('getBarberPayment', 'RestAPI@getBarberPayment');
		Route::post('uploadPortifolio', 'RestAPI@uploadPortifolio');
		Route::post('setNewBarberPassword', 'RestAPI@setNewBarberPassword');
		Route::post('getStatistics', 'RestAPI@getStatistics');
		Route::post('getBarberRating', 'RestAPI@getBarberRating');
		Route::post('noshowBook', 'RestAPI@noshowBook');
		Route::post('uploadFavourite', 'RestAPI@uploadFavourite');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('apply', function () {
    return view('apply');
});

Route::get('become-our-barber', function () {
    return view('apply');
});

Route::get('pricing', function() {
    return view('pricing');
});

Route::get('terms-and-conditions', function() {
    return view('terms-and-conditions');
});

Route::get('privacy-policy', function() {
    return view('privacy-policy');
});

Route::get('our-barbers', function() {
    return view('our-barbers');
});


Route::post('apply/upload-photo', 'ApplyController@uploadPhoto');
Route::post('apply/store', 'ApplyController@store');
Route::post('subscribe/store', 'ApplyController@subscribeNew');
Route::get('booking', 'BookingController@index');
Route::post('verifyPhone', 'BookingController@verifyPhone');
Route::post('verifyCode', 'BookingController@verifyCode');
Route::post('request-booking', 'BookingController@request_booking');
Route::get('booking/status/{id}', 'BookingController@booking_status');
Route::post('dologin', 'BookingController@doLogin');
Route::post('doregister', 'BookingController@doRegister');
Route::post('dologout', 'BookingController@doLogout');

//Route::get('paywithpaypal', array('as' => 'paywithpaypal', 'uses' => 'PaypalController@payWithPaypal',));
Route::get('booking/payment/{id}', array('as' => 'paywithpaypal', 'uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal', 'uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status', 'uses' => 'PaypalController@getPaymentStatus',));
