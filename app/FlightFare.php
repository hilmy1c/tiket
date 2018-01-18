<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightFare extends Model
{
    protected $fillable = [
        'class', 'flight_number', 'fare'
    ];
}
