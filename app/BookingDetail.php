<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'flight_number', 'train_number', 'flight_fare_total', 'train_fare_total', 'adult_number', 'child_number', 'baby_number', 'adult_fare', 'child_fare', 'baby_fare', 'booking_id',
    ];
}
