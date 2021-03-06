<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $fillable = [
    	'image', 'code', 'name',
    ];

    public function airplane()
    {
    	return $this->hasMany('App\Airplane');
    }
}
