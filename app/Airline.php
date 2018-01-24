<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $fillable = [
    	'code', 'name',
    ];

    public function airplane()
    {
    	return $this->hasOne('App\Airplane');
    }
}
