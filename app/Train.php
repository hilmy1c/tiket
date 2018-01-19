<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $fillable = [
    	'name', 'economy_seat_number', 'business_seat_number', 'executive_seat_number'
    ];
}
