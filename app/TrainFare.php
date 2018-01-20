<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainFare extends Model
{
    protected $fillable = [
    	'class', 'train_number', 'fare'
    ];
}
