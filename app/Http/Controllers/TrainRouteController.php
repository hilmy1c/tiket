<?php

namespace App\Http\Controllers;

use App\Train;
use App\TrainRoute;
use App\TrainStation;
use Illuminate\Http\Request;

class TrainRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['train_routes'] = TrainRoute::all();

        return view('train_route.train_route', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['trains'] = Train::all();
        $data['train_stations'] = TrainStation::all();

        return view('train_route.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $full_route = [];
        $full_departure_time = [];
        $full_arrival_time = [];

        $full_route[1] = $request->start_route;
        $full_departure_time[1] = $request->departure_time;
        $full_arrival_time[1] = null;

        for ($i=2; $i <= $request->route_number; $i++) {
            $full_route[$i] = $request->{'route' . $i};
            $full_departure_time[$i] = $request->{'departure_time' . $i};
            $full_arrival_time[$i] = $request->{'arrival_time' . $i};
        }

        $full_route[$request->route_number+1] = $request->end_route;
        $full_departure_time[$request->route_number+1] = null;
        $full_arrival_time[$request->route_number+1] = $request->arrival_time;

        TrainRoute::create([
            'train_id' => $request->train,
            'start_route' => $request->start_route,
            'end_route' => $request->end_route,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'full_route' => serialize($full_route),
            'full_departure_time' => serialize($full_departure_time),
            'full_arrival_time' => serialize($full_arrival_time)
        ]);

        return redirect()->route('train_route.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['trains'] = Train::all();
        $data['train_stations'] = TrainStation::all();
        $data['train_route'] = TrainRoute::find($id);

        return view('train_route.edit', $data);
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
        $full_route = [];
        $full_departure_time = [];
        $full_arrival_time = [];

        $full_route[1] = $request->start_route;
        $full_departure_time[1] = $request->departure_time;
        $full_arrival_time[1] = null;

        for ($i=2; $i <= $request->route_number; $i++) {
            $full_route[$i] = $request->{'route' . $i};
            $full_departure_time[$i] = $request->{'departure_time' .$i};
            $full_arrival_time[$i] = $request->{'arrival_time' . $i};
        }

        $full_route[$request->route_number] = $request->end_route;
        $full_departure_time[$request->route_number] = null;
        $full_arrival_time[$request->route_number] = $request->arrival_time;

        TrainRoute::find($id)->update([
            'train_id' => $request->train,
            'start_route' => $request->start_route,
            'end_route' => $request->end_route,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'full_route' => serialize($full_route),
            'full_departure_time' => serialize($full_departure_time),
            'full_arrival_time' => serialize($full_arrival_time)
        ]);

        return redirect()->route('train_route.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TrainRoute::destroy($id);

        return redirect()->back();
    }

    public function getStation()
    {
        $trains = TrainStation::with('city')->get();

        echo json_encode($trains);
    }
}
