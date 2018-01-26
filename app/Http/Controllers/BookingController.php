<?php

namespace App\Http\Controllers;

use App\User;
use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bookings'] = Booking::all();

        return view('booking.booking', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::all();

        return view('booking.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Booking::create([
            'booking_code' => $request->booking_code,
            'user_id' => $request->user_id,
            'booking_date' => $request->booking_date,
            'status' => $request->status,
            'payment_status' => $request->payment_status
        ]);

        return redirect()->route('booking.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['booking'] = Booking::find($id);
        $data['users'] = User::all();

        return view('booking.edit', $data);
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
        Booking::find($id)->update([
            'booking_code' => $request->booking_code,
            'user_id' => $request->user_id,
            'booking_date' => $request->booking_date,
            'status' => $request->status,
            'payment_status' => $request->payment_status
        ]);

        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::destroy($id);

        return redirect()->route('booking.index');
    }
}
