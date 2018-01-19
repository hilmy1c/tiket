<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = [
    	'aircraft_type', 'economy_seat_number', 'business_seat_number'
    ];
}
