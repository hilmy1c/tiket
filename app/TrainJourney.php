<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainJourney extends Model
{
    protected $fillable = [
        'train_route_id', 'start_station_id', 'end_station_id', 'departure_time', 'arrival_time'
    ];

    public function trainRoute()
    {
    	return $this->belongsTo('App\TrainRoute');
    }

    public function startStation()
    {
    	return $this->belongsTo('App\TrainStation', 'start_station_id');
    }

    public function endStation()
    {
    	return $this->belongsTo('App\TrainStation', 'end_station_id');
    }
}
