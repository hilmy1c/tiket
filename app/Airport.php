<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [
    	'name', 'code', 'city'
    ];

    public function fromAirport()
    {
    	$this->hasMany('App\Flight', 'from_airport_id', 'id');
    }

    public function destinationAirport()
    {
    	$this->hasMany('App\Flight', 'destination_airport_id', 'id');
    }
}
