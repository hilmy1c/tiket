<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
    	'bank_name', 'owner', 'account', 'image'
    ];
}
