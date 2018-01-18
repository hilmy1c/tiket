<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainJourney extends Model
{
    protected $fillable = [
        'departure_station', 'arrival_station', 'train_number', 'departure_time', 'arrival_time', 'train_id'
    ];
}
