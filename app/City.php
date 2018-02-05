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
}
