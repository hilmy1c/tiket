<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = [
        'booking_code', 'name', 'status', 'birthday', 'appellation'
    ];

    public function booking()
    {
    	return $this->belongsTo('App\Booking', 'booking_code', 'booking_code');
    }
}
