<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = [
    	'aircraft_type', 'economy_seat_num', 'business_seat_num'
    ];
}
