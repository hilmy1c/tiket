<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = [
    	'book_det', 'name', 'id_no',
    ];
}
