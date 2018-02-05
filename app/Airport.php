<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [
    	'name', 'code', 'city_id'
    ];

    public function fromAirport()
    {
    	return $this->hasMany('App\Flight', 'from_airport_id', 'id');
    }

    public function destinationAirport()
    {
    	return $this->hasMany('App\Flight', 'destination_airport_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
