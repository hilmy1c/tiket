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
        $data['airplanes'] = Airplane::with('airline')->get();
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

        return redirect()->route('flight_fare.create', ['id' => $request->flight_number]);
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
        $data['airplanes'] = Airplane::with('airline')->get();
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

    public function search(Request $request)
    {
        $data['jawa'] = Airport::all();
        $data['sumatera'] = Airport::all();
        
        $data['flights'] = Flight::where([
            ['from_airport_id', $request->from],
            ['destination_airport_id', $request->destination],
        ])->whereDate('departure_time', $request->departure_time)->get();

        foreach ($data['flights'] as $flight) {
            $prevVal = 0;
            foreach ($flight->flightFares->where('class', 'economy') as $flightFare) {
                switch ($flightFare->passenger) {
                    case 'adult':
                        $prevVal = $this->unformatNumber($flightFare->fare) * intval($request->adult_number) + $prevVal;
                        break;

                    case 'child':
                        $prevVal = $this->unformatNumber($flightFare->fare) * intval($request->child_number) + $prevVal;
                        break;

                    case 'baby':
                        $prevVal = $this->unformatNumber($flightFare->fare) * intval($request->baby_number) + $prevVal;
                        break;
                }
            }

            $flight->fare = number_format($prevVal, 0, '', '.');

            $date1 = date_create($flight->departure_time);
            $date2 = date_create($flight->arrival_time);
            $interval = date_diff($date1, $date2);
            $flight->timeRange = $interval->format('%h')." Jam ".$interval->format('%i')." Menit"; 
        }

        $data['fromAirport'] = Airport::find($request->from);
        $data['destinationAirport'] = Airport::find($request->destination);
        $data['date'] = $request->departure_time;
        $data['passengers'] = [$request->adult_number . ' Dewasa' , $request->child_number . ' Anak', $request->baby_number . ' Bayi'];
        $data['class'] = $request->class;

        return view('flight-list', $data);
    }

    public function getFlightNumber($id)
    {
        $airplane = Airplane::find($id);
        $flight = Flight::orderBy('created_at', 'desc')->first();

        $n = $flight == null ? 1 : intval(substr($flight->flight_number, 2, 3)) + 1;

        echo $airplane->airline->code . str_pad($n, 3, 0, STR_PAD_LEFT);
    }

    public function unformatNumber($text)
    {
        $array = explode('.', $text);

        return intval(join('', $array));
    }
}
