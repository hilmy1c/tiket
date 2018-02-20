<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
    	'city', 'province', 'island'
    ];

    public function airports()
    {
    	return $this->hasMany('App\Airport');
    }

    public function trainStations()
    {
    	return $this->hasMany('App\TrainStation');
    }
}
