<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightFare extends Model
{
    protected $fillable = [
        'class', 'flight_number', 'fare'
    ];

    public function booking_detail()
    {
    	return $this->hasOne('App\BookingDetail', 'fare_id');
    }
}
