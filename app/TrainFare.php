<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainFare extends Model
{
    protected $fillable = [
    	'class', 'train_number', 'fare'
    ];

    public function bookingDetail()
    {
    	return $this->hasOne('App\BookingDetail', 'fare_id');
    }
}
