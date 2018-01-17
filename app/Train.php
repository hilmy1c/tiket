<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $fillable = [
    	'name', 'economy_seat_num', 'business_seat_num', 'executive_seat_num'
    ];
}
