<?php

namespace App\Http\Controllers;

use App\City;
use App\Train;
use App\TrainRoute;
use App\TrainStation;
use App\TrainJourney;
use Illuminate\Http\Request;

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
        $data['trains'] = Train::distinct()->get(['name']);

        return view('train_journey.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route = TrainRoute::find($request->pilih_rute);

        $startStationKey = array_search($request->departure_station, unserialize($route->full_route));
        $endStationKey = array_search($request->arrival_station, unserialize($route->full_route));
        $departureTime = unserialize($route->full_departure_time)[$startStationKey];
        $arrivalTime = unserialize($route->full_arrival_time)[$endStationKey];

        TrainJourney::create([
            'train_route_id' => $request->pilih_rute,
            'start_station_id' => $request->departure_station,
            'sub_class' => $request->sub_class,
            'sub_class_code' => $request->sub_class_code,
            'end_station_id' => $request->arrival_station,
            'departure_time' => date('Y-m-d H:i:s', strtotime($request->departure_time . $departureTime)),
            'arrival_time' => date('Y-m-d H:i:s', strtotime($request->arrival_time . $arrivalTime)),
        ]);

        $trainJourneyId = TrainJourney::orderBy('created_at', 'desc')->first();

        return redirect()->route('train_fare.create', ['train_journey_id' => $trainJourneyId->id]);
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
        $data['trains'] = Train::distinct()->get(['name']);

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
        $route = TrainRoute::find($request->pilih_rute);

        $startStationKey = array_search($request->departure_station, unserialize($route->full_route));
        $endStationKey = array_search($request->arrival_station, unserialize($route->full_route));
        $departureTime = unserialize($route->full_departure_time)[$startStationKey];
        $arrivalTime = unserialize($route->full_arrival_time)[$endStationKey];

        TrainJourney::find($id)->update([
            'train_route_id' => $request->pilih_rute,
            'start_station_id' => $request->departure_station,
            'sub_class' => $request->sub_class,
            'sub_class_code' => $request->sub_class_code,
            'end_station_id' => $request->arrival_station,
            'departure_time' => date('Y-m-d H:i:s', strtotime($request->departure_time . $departureTime)),
            'arrival_time' => date('Y-m-d H:i:s', strtotime($request->arrival_time . $arrivalTime)),
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

    public function searchIndex()
    {
        $data['stations'] = TrainStation::all();
        $data['islands'] = City::distinct()->get(['island']);

        return view('kereta-api', $data);
    }

    public function search(Request $request)
    {
        $data['train_journeys'] = TrainJourney::where([
            ['start_station_id', $request->start_station],
            ['end_station_id', $request->end_station]
        ])->get();

        return view('journey-list', $data);
    }

    public function getStation($id)
    {
        $trains = TrainRoute::with('startStation.city')->where('train_id', $id)->get();

        $array = [];

        foreach ($trains as $train) {
            array_push($array, $train->startStation);
        }

        echo json_encode($array);
    }

    public function getEndStation(Request $request, $id)
    {
        $station = TrainRoute::find($id);

        $train_routes = unserialize($station->full_route);

        $array = [];

        for ($i=2; $i <= sizeof($train_routes); $i++) {
            $el = '<option value="' . $this->startStation($train_routes[$i])->id . '">Stasiun ' . $this->startStation($train_routes[$i])->name . ', '. $this->startStation($train_routes[$i])->city->city .' ('. $this->startStation($train_routes[$i])->code .')</option>';

            array_push($array, $el);
        }

        echo json_encode($array);
    }

    public function editEndStation(Request $request, $id)
    {
        $station = TrainRoute::find($id);
        $trainJourney = TrainJourney::find($request->train_journey_id);

        $train_routes = unserialize($station->full_route);

        $array = [];
        $select = "";

        for ($i=2; $i <= sizeof($train_routes); $i++) {
            if ($this->startStation($train_routes[$i])->id == $trainJourney->end_station_id) {
                $select = "selected";
            } else {
                $select = "";
            }

            $el = '<option value="' . $this->startStation($train_routes[$i])->id . '" '. $select .'>Stasiun ' . $this->startStation($train_routes[$i])->name . ', '. $this->startStation($train_routes[$i])->city->city .' ('. $this->startStation($train_routes[$i])->code .')</option>';

            array_push($array, $el);
        }

        echo json_encode($array);
    }

    public function getRouteStation($id)
    {
        $station = TrainStation::find($id);

        echo json_encode($station);
    }

    public function getRoute($id)
    {
        $routes = TrainRoute::with(['startStation.city', 'endStation.city'])->where('train_id', $id)->get();

        echo json_encode($routes);
    }

    public function getStartStation($id)
    {
        $station = TrainRoute::find($id);

        $train_routes = unserialize($station->full_route);

        $array = [];

        for ($i=1; $i <= sizeof($train_routes) - 1; $i++) {
            $el = '<option value="' . $this->startStation($train_routes[$i])->id . '">Stasiun ' . $this->startStation($train_routes[$i])->name . ', '. $this->startStation($train_routes[$i])->city->city .' ('. $this->startStation($train_routes[$i])->code .')</option>';

            array_push($array, $el);
        }

        echo json_encode($array);
    }

    public function editStartStation(Request $request, $id)
    {
        $station = TrainRoute::find($id);
        $trainJourney = TrainJourney::find($request->train_journey_id);

        $train_routes = unserialize($station->full_route);

        $array = [];
        $select = "";

        for ($i=1; $i <= sizeof($train_routes) - 1; $i++) {
            if ($this->startStation($train_routes[$i])->id == $trainJourney->start_station_id) {
                $select = "selected";
            } else {
                $select = "";
            }

            $el = '<option value="' . $this->startStation($train_routes[$i])->id . '" '. $select .'>Stasiun ' . $this->startStation($train_routes[$i])->name . ', '. $this->startStation($train_routes[$i])->city->city .' ('. $this->startStation($train_routes[$i])->code .')</option>';

            array_push($array, $el);
        }

        echo json_encode($array);
    }

    public function startStation($id)
    {
        return TrainStation::find($id);
    }

    public function getTrainSeatNumber($id)
    {
        $train = Train::where('name', $id)->first();

        echo json_encode($train);
    }
}
