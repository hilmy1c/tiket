<?php

namespace App\Http\Controllers;

use App\Flight;
use App\FlightFare;
use Illuminate\Http\Request;

class FlightFareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['flight_fares'] = FlightFare::with('flight')->get();

        return view('flight_fare.flight_fare', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['flight'] = Flight::where('flight_number', $id)->first();

        return view('flight_fare.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FlightFare::insert([
            [
                'flight_id' => $request->flight_id,
                'class' => 'economy',
                'passenger' => 'adult',
                'fare' => $request->economy_adult,
            ],
            [
                'flight_id' => $request->flight_id,
                'class' => 'economy',
                'passenger' => 'child',
                'fare' => $request->economy_child,
            ],
            [
                'flight_id' => $request->flight_id,
                'class' => 'economy',
                'passenger' => 'baby',
                'fare' => $request->economy_baby,
            ],
            [
                'flight_id' => $request->flight_id,
                'class' => 'business',
                'passenger' => 'adult',
                'fare' => $request->business_adult,
            ],
            [
                'flight_id' => $request->flight_id,
                'class' => 'business',
                'passenger' => 'child',
                'fare' => $request->business_child,
            ],
            [
                'flight_id' => $request->flight_id,
                'class' => 'business',
                'passenger' => 'baby',
                'fare' => $request->business_baby,
            ],
        ]);

        return redirect()->route('flight_fare.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['flight_fare'] = FlightFare::find($id);

        return view('flight_fare.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        FlightFare::find($id)->update([
            'fare' => $request->fare
        ]);

        return redirect()->route('flight_fare.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FlightFare::destroy($id);

        return redirect()->route('flight_fare.index');
    }
}
