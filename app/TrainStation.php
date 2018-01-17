<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainStation extends Model
{
    protected $fillable = [
    	'name', 'code', 'city'
    ];
}
