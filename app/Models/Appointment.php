<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'barber_id', 'customer_id', 'senior_cut', 'junior_cut', 'shave_cut', 'beard_trim', 'kids_cut', 'bookdate', 'booking_id'
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
