<?php

namespace App\Http\Controllers;

use App\BookingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['booking_details'] = BookingDetail::find($id);

        return view('booking_detail.booking_detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking_detail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BookingDetail::create([
            'travel_number' => $request->travel_number,
            'status' => $request->status,
            'fare_id' => $request->fare_id,
            'booking_code' => $request->booking_code
        ]);

        return redirect()->route('booking_detail.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['booking_detail'] = BookingDetail::find($id);

        return view('booking_detail.edit', $data);
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
        BookingDetail::find($id)->update([
            'travel_number' => $request->travel_number,
            'status' => $request->status,
            'fare_id' => $request->fare_id,
            'booking_code' => $request->booking_code
        ]);

        return redirect()->route('booking_detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BookingDetail::destroy($id);

        return redirect()->route('booking_detail.index');
    }
}
