<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = [
    	'aircraft_type', 'economy_seat_number', 'business_seat_number', 'airline_id',
    ];

    public function flight()
    {
    	return $this->hasOne('App\Flight');
    }

    public function airline()
    {
    	return $this->belongsTo('App\Airline');
    }
}
