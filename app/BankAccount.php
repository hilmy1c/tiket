<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
    	'bank_name', 'owner', 'account', 'image'
    ];

    public function bookings()
    {
    	return $this->hasMany('App\Booking');
    }
}
