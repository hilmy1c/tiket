<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airplane;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['airplanes'] = Airplane::with('airline')->get();

        return view('airplane.airplane', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['airlines'] = Airline::all();

        return view('airplane.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Airplane::create([
            'aircraft_type' => $request->aircraft_type,
            'economy_seat_number' => $request->economy_seat_number,
            'business_seat_number' => $request->business_seat_number,
            'airline_id' => $request->airline_id,
        ]);

        return redirect()->route('airplane.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['airplane'] = Airplane::find($id);
        $data['airlines'] = Airline::all();

        return view('airplane.edit', $data);
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
        Airplane::find($id)->update([
            'aircraft_type' => $request->aircraft_type,
            'economy_seat_number' => $request->economy_seat_number,
            'business_seat_number' => $request->business_seat_number,
            'airline_id' => $request->airline_id,
        ]);

        return redirect()->route('airplane.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Airplane::destroy($id);

        return redirect()->route('airplane.index');
    }
}
