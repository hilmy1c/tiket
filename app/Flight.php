<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
    	'flight_number', 'from', 'dest', 'depart_time', 'arriv_time', 'airplane_id'
    ];
}
