<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'travel_number', 'status', 'fare_id', 'booking_code'
    ];
}
