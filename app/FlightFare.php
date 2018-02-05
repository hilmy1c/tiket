<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightFare extends Model
{
    protected $fillable = [
        'class', 'passenger', 'flight_id', 'fare'
    ];

    public function flight()
    {
    	return $this->belongsTo('App\Flight');
    }

    public function booking_detail()
    {
    	return $this->hasOne('App\BookingDetail', 'fare_id');
    }
}
