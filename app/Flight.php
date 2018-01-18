<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'flight_number', 'from', 'destination', 'departure_time', 'arrival_time', 'airplane_id'
    ];
}
