<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $fillable = [
    	'name', 'economy_seat_number', 'business_seat_number', 'executive_seat_number', 'locomotive_type', 'train_number'
    ];

    public function fromStation()
    {
    	return $this->belongsTo('App\TrainStation', 'from_station');
    }

    public function toStation()
    {
    	return $this->belongsTo('App\TrainStation', 'to_station');
    }

    public function route()
    {
        return $this->hasOne('App\TrainRoute');
    }
}
