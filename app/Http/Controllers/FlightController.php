<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Airport;
use App\Airplane;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['flights'] = Flight::with(['airplane.airline', 'fromAirport'])->get();

        return view('flight.flight', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['airplanes'] = Flight::all();
        $data['airports'] = Airport::all();

        return view('flight.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Flight::create([
            'flight_number' => $request->flight_number,
            'from_airport_id' => $request->from_airport_id,
            'destination_airport_id' => $request->destination_airport_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'airplane_id' => $request->airplane_id
        ]);

        return redirect()->route('flight.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['flight'] = Flight::find($id);
        $data['airplanes'] = Flight::all();
        $data['airports'] = Airport::all();

        return view('flight.edit', $data);
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
        Flight::find($id)->update([
            'flight_number' => $request->flight_number,
            'from_airport_id' => $request->from_airport_id,
            'destination_airport_id' => $request->destination_airport_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'airplane_id' => $request->airplane_id
        ]);

        return redirect()->route('flight.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Flight::destroy($id);

        return redirect()->route('flight.index');
    }
}
