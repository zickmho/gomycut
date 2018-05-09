<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table = 'apply';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'first_name', 'last_name', 'email', 'password', 'country_code',
        'phone', 'city', 'pin_code', 'description', 'certificate', 'experience', 'client_photo',
        'service_barber_cut_has', 'service_barber_cut_price',
        'service_stylish_cut_has', 'service_stylish_cut_price',
        'service_long_cut_has', 'service_long_cut_price',
        'service_beard_trim_has', 'service_beard_trim_price',
        'service_kids_cut_has', 'service_kids_cut_price',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
