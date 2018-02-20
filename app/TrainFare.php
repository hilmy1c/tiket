<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainFare extends Model
{
    protected $fillable = [
    	'class', 'fare', 'passenger', 'train_journey_id'
    ];

    public function bookingDetail()
    {
    	return $this->hasOne('App\BookingDetail', 'fare_id');
    }

    public function trainJourney()
    {
    	return $this->belongsTo('App\TrainJourney');
    }
}
