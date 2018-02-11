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
        $data['adult_fare'] = $request->adult_fare;
        $data['child_fare'] = $request->child_fare;
        $data['baby_fare'] = $request->baby_fare;
        $data['booking_code'] = $request->booking_code;
        $data['flight_number'] = $request->flight_number;
        $data['fare_total'] = $request->fare_total;

        return view('passenger.create', $data);
    }

    public function store(Request $request)
    {
        Booking::create([
            'booking_code' => $request->booking_code,
            'user_id' => $request->user_id,
            'booking_date' => date('Y-m-d'),
        ]);

        $booking_id = Booking::orderBy('id', 'desc')->first()->id;

        BookingDetail::create([
            'flight_number' => $request->flight_number,
            'flight_fare_total' => $request->fare,
            'booking_id' =>  $booking_id,
            'adult_number' => $request->adult_number,
            'child_number' => $request->child_number,
            'baby_number' => $request->baby_number,
            'adult_fare' => $request->adult_fare,
            'child_fare' => $request->child_fare,
            'baby_fare' => $request->baby_fare,
            'customer_name' => $request->customer_name,
            'customer_phone' => '+62' . $request->customer_phone,
            'customer_email' => $request->customer_email
        ]);

        if ($request->adult_number != 0) {
            for ($i=1; $i <= $request->adult_number; $i++) {
            	Passenger::create([
            		'booking_code' => $request->booking_code,
                    'appellation' => $request->{'adult_appellation_' . $i},
                    'name' => $request->{'adult_fullname_' . $i},
                    'status' => 'Dewasa'
            	]);
            }
        }

        if ($request->child_number != 0) {
            for ($i=1; $i <= $request->child_number; $i++) { 
                Passenger::create([
                    'booking_code' => $request->booking_code,
                    'appellation' => $request->{'child_appellation_' . $i},
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
                    'appellation' => $request->{'baby_appellation_' . $i},
                    'name' => $request->{'baby_fullname_' . $i},
                    'status' => 'Bayi',
                    'birthday' => $request->{'baby_year_' . $i} . '-' . $request->{'baby_month_' . $i} . '-' . $request->{'baby_day_' . $i},
                ]);
            }
        }

        return redirect()->route('booking.payment', ['id' => $booking_id]);
    }
}
