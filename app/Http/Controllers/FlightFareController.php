<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlightFare;

class FlightFareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['flight_fares'] = FlightFare::all();

        return view('flight_fare.flight_fare', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flight_fare.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FlightFare::create([
            'class' => $request->class,
            'flight_number' => $request->flight_number,
            'fare' => $request->fare
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
            'class' => $request->class,
            'flight_number' => $request->flight_number,
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
