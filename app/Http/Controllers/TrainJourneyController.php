<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainJourney;

class TrainJourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['train_journeys'] = TrainJourney::all();

        return view('train_journey.train_journey', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('train_journey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TrainJourney::create([
            'departure_station' => $request->departure_station,
            'arrival_station' => $request->arrival_station,
            'train_number' => $request->train_number,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'train_id' => $request->train_id
        ]);

        return redirect()->route('train_journey.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['train_journey'] = TrainJourney::find($id);

        return view('train_journey.edit', $data);
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
        TrainJourney::find($id)->update([
            'departure_station' => $request->departure_station,
            'arrival_station' => $request->arrival_station,
            'train_number' => $request->train_number,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'train_id' => $request->train_id
        ]);

        return redirect()->route('train_journey.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TrainJourney::destroy($id);

        return redirect()->route('train_journey.index');
    }
}
