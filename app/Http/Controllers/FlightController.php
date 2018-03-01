<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Booking;
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

    public function show(Request $request, $id)
    {
        $data['flight'] = Flight::find($id);
        $data['date'] = $request->departure_time;
        $data['class'] = $request->class;
        $data['fare'] = $request->fare;
        $data['timeRange'] = $request->timeRange;
        $data['adult_number'] = $request->adult_number;
        $data['child_number'] = $request->child_number;
        $data['baby_number'] = $request->baby_number;
        $data['adult_fare'] = number_format($request->adult_fare, 0, '', '.');
        $data['child_fare'] = number_format($request->child_fare, 0, '', '.');
        $data['baby_fare'] = number_format($request->baby_fare, 0, '', '.');
        $data['booking_code'] = $this->getBookingCode();

        return view('flight-detail', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quota = Airplane::find($request->airplane_id);

        Flight::create([
            'flight_number' => $request->flight_number,
            'from_airport_id' => $request->from_airport_id,
            'destination_airport_id' => $request->destination_airport_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'airplane_id' => $request->airplane_id,
            'economy_quota' => $quota->economy_seat_number,
            'business_quota' => $quota->business_seat_number
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
        
        if ($request->class == 'economy') {
            $data['flights'] = Flight::where([
                ['from_airport_id', $request->from],
                ['destination_airport_id', $request->destination],
                ['economy_quota', '!=', 0]
            ])->whereDate('departure_time', $request->departure_time)->get();
        } else {
            $data['flights'] = Flight::where([
                ['from_airport_id', $request->from],
                ['destination_airport_id', $request->destination],
                ['business_quota', '!=', 0]
            ])->whereDate('departure_time', $request->departure_time)->get();
        }

        foreach ($data['flights'] as $flight) {
            $prevVal = 0;
            foreach ($flight->flightFares->where('class', $request->class) as $flightFare) {
                switch ($flightFare->passenger) {
                    case 'adult':
                        $prevVal = $this->unformatNumber($flightFare->fare) * intval($request->adult_number) + $prevVal;
                        $flight->adult_fare = $this->unformatNumber($flightFare->fare) * intval($request->adult_number);
                        break;

                    case 'child':
                        $prevVal = $this->unformatNumber($flightFare->fare) * intval($request->child_number) + $prevVal;
                        $flight->child_fare = $this->unformatNumber($flightFare->fare) * intval($request->child_number);
                        break;

                    case 'baby':
                        $prevVal = $this->unformatNumber($flightFare->fare) * intval($request->baby_number) + $prevVal;
                        $flight->baby_fare = $this->unformatNumber($flightFare->fare) * intval($request->baby_number);
                        break;
                }
            }

            $flight->fare = number_format($prevVal, 0, '', '.');

            $date1 = date_create($flight->departure_time);
            $date2 = date_create($flight->arrival_time);
            $interval = date_diff($date1, $date2);
            $flight->timeRange = $interval->format('%h')." Jam ".$interval->format('%i')." Menit"; 
        }

        $data['from'] = $request->from;
        $data['destination'] = $request->destination;
        $data['kotaAsal'] = $request->kota_asal;
        $data['kotaTujuan'] = $request->kota_tujuan;
        $data['fromAirport'] = Airport::find($request->from);
        $data['destinationAirport'] = Airport::find($request->destination);
        $data['date'] = $request->departure_time;
        $data['adult_number'] = $request->adult_number;
        $data['child_number'] = $request->child_number;
        $data['baby_number'] = $request->baby_number;
        $data['class'] = ucwords($request->class);

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

    public function getBookingCode()
    {
        $length_abjad = "2";
        $length_angka = "4";

        $huruf = "ABCDEFGHJKLMNOPQRSTUVWXYZ";

        $i = 1;
        $text = "";
        while ($i <= $length_abjad) {
            $text .= $huruf{mt_rand(0, strlen($huruf))};
            $i++;
        }

        $datejam = date("His");
        $time_md5 = rand(time(), $datejam);
        $cut = substr($time_md5, 0, $length_angka); 

        $acak = str_shuffle($text.$cut);

        if (Booking::where('booking_code', $acak)->first() > 0) {
            $acak = $this->getBookingCode();
        }

        return $acak;
    }

    public function getQuota($id)
    {
        $airplane = Airplane::find($id);

        echo (int) $airplane->economy_seat_number + (int) $airplane->business_seat_number;
    }
}
