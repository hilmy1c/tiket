<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'travel_number', 'status', 'fare_id', 'booking_code'
    ];

    public function booking()
    {	
    	return $this->belongsTo('App\Booking');
    }

    public function trainFare()
    {
    	return $this->belongsTo('App\TrainFare');
    }

    public function flightFare()
    {
    	return $this->belongsTo('App\FlightFare');
    }
}
