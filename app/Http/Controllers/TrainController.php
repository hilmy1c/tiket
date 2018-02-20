<?php

namespace App\Http\Controllers;

use App\Train;
use App\TrainStation;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['trains'] = Train::all();

        return view('train.train', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('train.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Train::create([
            'name' => $request->name,
            'economy_seat_number' => $request->economy_seat_number,
            'business_seat_number' => $request->business_seat_number,
            'executive_seat_number' => $request->executive_seat_number,
            'locomotive_type' => $request->locomotive_type
        ]);

        return redirect()->route('train.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['train'] = Train::find($id);

        return view('train.edit', $data);
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
        Train::find($id)->update([
            'name' => $request->name,
            'economy_seat_number' => $request->economy_seat_number,
            'business_seat_number' => $request->business_seat_number,
            'executive_seat_number' => $request->executive_seat_number,
            'locomotive_type' => $request->locomotive_type
        ]);

        return redirect()->route('train.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Train::destroy($id);

        return redirect()->route('train.index');
    }
}
