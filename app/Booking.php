<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_code', 'user_id', 'booking_date', 'status', 'payment_status', 'bank_account_id', 'image'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function bookingDetail()
    {
    	return $this->hasOne('App\BookingDetail');
    }

    public function passengers()
    {
        return $this->hasMany('App\Passenger', 'booking_code', 'booking_code');
    }

    public function bankAccount()
    {
        return  $this->belongsTo('App\BankAccount');
    }
}
