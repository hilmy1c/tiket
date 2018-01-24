<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'flight_number', 'from_airport_id', 'destination_airport_id', 'departure_time', 'arrival_time', 'airplane_id'
    ];

    public function airplane()
    {
    	return $this->belongsTo('App\Airplane');
    }

    public function fromAirport()
    {
    	return $this->belongsTo('App\Airport', 'from_airport_id');
    }

    public function destinationAirport()
    {
    	return $this->belongsTo('App\Airport', 'destination_airport_id');
    }
}
