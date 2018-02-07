<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function create(Request $request, $id)
    {
    	$data['flight'] = Flight::find($id);
        $data['class'] = $request->class;
        $data['adult_number'] = $request->adult_number;
        $data['child_number'] = $request->child_number;
        $data['baby_number'] = $request->baby_number;
        $data['booking_code'] = $request->booking_code;

        return view('passenger.create', $data);
    }

    public function store(Request $request)
    {
    	Passenger::create([
    		
    	]);
    }
}
