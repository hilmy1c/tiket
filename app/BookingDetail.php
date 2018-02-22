<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'flight_number', 'train_journey_id', 'flight_fare_total', 'train_fare_total', 'adult_number', 'child_number', 'baby_number', 'adult_fare', 'child_fare', 'baby_fare', 'booking_id', 'customer_phone', 'customer_name', 'customer_email'
    ];

    public function booking()
    {
    	return $this->belongsTo('App\BookingDetail');
    }

    public function flight()
    {
    	return $this->belongsTo('App\Flight', 'flight_number', 'flight_number');
    }

    public function trainJourney()
    {
        return $this->belongsTo('App\TrainJourney');
    }
}
