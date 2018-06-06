<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionBooking extends Model
{
    protected $table = 'session_booking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'session_id', 'customer_id', 'senior_cut', 'junior_cut', 'shave_cut', 'beard_trim', 'kids_cut',
        'price', 'discount', 'total_price', 'contact_title', 'name', 'email', 'phone', 'city',
        'postcode', 'house_unit_no', 'address', 'remarks', 'request_date', 'request_time',
        'verify_code', 'notification_token', 'favourite', 'state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function customer() {
        return $this->hasOne('\App\Users', 'id', 'customer_id');
    }
}
