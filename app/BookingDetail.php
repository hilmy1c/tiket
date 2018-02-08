<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'travel_number', 'is_paid', 'fare_total', 'booking_id'
    ];
}
