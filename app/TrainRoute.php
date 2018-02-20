<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainRoute extends Model
{
    protected $fillable = [
    	'train_id', 'start_route', 'end_route', 'departure_time', 'arrival_time', 'full_route', 'full_departure_time', 'full_arrival_time'
    ];

    public function train()
    {
    	return $this->belongsTo('App\Train');
    }

    public function startStation()
    {
    	return $this->belongsTo('App\TrainStation', 'start_route');
    }

    public function endStation()
    {
    	return $this->belongsTo('App\TrainStation', 'end_route');
    }
}
