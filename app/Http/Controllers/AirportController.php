<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airport;
use App\City;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['airports'] = Airport::all();

        return view('airport.airport', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cities'] = City::orderBy('city', 'asc')->get();

        return view('airport.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Airport::create([
            'name' => $request->name,
            'code' => $request->code,
            'city' => $request->city
        ]);

        return redirect()->route('airport.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['airport'] = Airport::find($id);
        $data['cities'] = City::orderBy('city', 'asc')->get();

        return view('airport.edit', $data);
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
        Airport::find($id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'city' => $request->city
        ]);

        return redirect()->route('airport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Airport::destroy($id);

        return redirect()->route('airport.index');
    }
}
