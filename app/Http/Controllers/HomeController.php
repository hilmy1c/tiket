<?php

namespace App\Http\Controllers;

use App\City;
use App\Airport;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data['airports'] = Airport::all();
        $data['startAirport'] = Airport::where('code', 'HLP')->first();
        $data['endAirport'] = Airport::where('code', 'BDO')->first();

        return view('home', $data);
    }
}
