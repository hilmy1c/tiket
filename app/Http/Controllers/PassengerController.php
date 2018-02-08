<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Booking;
use App\Passenger;
use App\BookingDetail;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function index()
    {
        $data['passengers'] = Passenger::all();

        return view('passenger.passenger', $data);
    }

    public function create(Request $request, $id)
    {
    	$data['flight'] = Flight::find($id);
        $data['class'] = $request->class;
        $data['adult_number'] = $request->adult_number;
        $data['child_number'] = $request->child_number;
        $data['baby_number'] = $request->baby_number;
        $data['booking_code'] = $request->booking_code;

        return view('passenger.create', $data);
    }

    public function store(Request $request)
    {
        Booking::create([
            'booking_code' => $request->booking_code,
            'user_id' => $request->user_id,
            'booking_date' => date('Y-m-d'),
        ]);

        $booking_id = Booking::all()->orderBy('id', 'desc')->first();

        BookingDetail::create([
            'travel_number' => $request->flight_number,
            'flight_fare_total' => $request->flight_fare_total,
            'booking_id' =>  $booking_id
        ]);

        if ($request->adult_number != 0) {
            for ($i=1; $i <= $request->adult_number; $i++) {
            	Passenger::create([
            		'booking_code' => $request->booking_code,
                    'name' => $request->{'adult_fullname_' . $i},
                    'status' => 'Dewasa'
            	]);
            }
        }

        if ($request->child_number != 0) {
            for ($i=1; $i <= $request->child_number; $i++) { 
                Passenger::create([
                    'booking_code' => $request->booking_code,
                    'name' => $request->{'child_fullname_' . $i},
                    'status' => 'Anak',
                    'birthday' => $request->{'child_year_' . $i} . '-' .$request->{'child_month_' . $i} . '-' . $request->{'child_day_' . $i},
                ]);
            }
        }

        if ($request->baby_number != 0) {
            for ($i=1; $i <= $request->baby_number; $i++) { 
                Passenger::create([
                    'booking_code' => $request->booking_code,
                    'name' => $request->{'baby_fullname_' . $i},
                    'status' => 'Bayi',
                    'birthday' => $request->{'baby_year_' . $i} . '-' . $request->{'baby_month_' . $i} . '-' . $request->{'baby_day_' . $i},
                ]);
            }
        }

        return redirect()->back();
    }
}
