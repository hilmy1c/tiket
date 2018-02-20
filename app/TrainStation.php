<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainStation extends Model
{
    protected $fillable = [
    	'name', 'code', 'city_id'
    ];

    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    public function trains()
    {
    	return $this->hasMany('App\Train');
    }

    public function startRoutes()
    {
        return $this->hasMany('App\TrainRoute', 'start_route');
    }

    public function endRoutes()
    {
        return $this->hasMany('App\TrainRoute', 'end_route');
    }

    public function startStationJourneys()
    {
        return $this->hasMany('App\TrainJourney', 'start_station_id');
    }

    public function endStationJourneys()
    {
        return $this->hasMany('App\TrainJourney', 'end_station_id');
    }
}
