<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainStation;
use App\City;

class TrainStationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['train_stations'] = TrainStation::all();

        return view('train_station.train_station', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cities'] = City::orderBy('city', 'asc')->get();

        return view('train_station.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TrainStation::create([
            'name' => $request->name,
            'code' => $request->code,
            'city_id' => $request->city
        ]);

        return redirect()->route('train_station.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['train_station'] = TrainStation::find($id);
        $data['cities'] = City::orderBy('city', 'asc')->get();

        return view('train_station.edit', $data);
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
        TrainStation::find($id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'city_id' => $request->city
        ]);

        return redirect()->route('train_station.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TrainStation::destroy($id);

        return redirect()->route('train_station.index');
    }
}
