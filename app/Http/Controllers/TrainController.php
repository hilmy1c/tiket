<?php

namespace App\Http\Controllers;

use App\Train;
use App\TrainStation;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

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
        if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $request->start_train_number) || preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $request->end_train_number)) {

            preg_match('!\d+!', $request->start_train_number, $start_train_number);
            preg_match('!\d+!', $request->end_train_number, $end_train_number);

            for ($i = (int) $start_train_number[0]; $i <= (int) $end_train_number[0]; $i++) {
                Train::create([
                    'name' => $request->name,
                    'train_number' => 'KA ' . $i . preg_replace("/[^A-Z]+/", "", $request->start_train_number),
                    'economy_seat_number' => $request->economy_seat_number,
                    'business_seat_number' => $request->business_seat_number,
                    'executive_seat_number' => $request->executive_seat_number,
                    'locomotive_type' => $request->locomotive_type
                ]);
            }
        } else {
            for ($i = (int)$request->start_train_number; $i <= (int)$request->end_train_number; $i++) {
                Train::create([
                    'name' => $request->name,
                    'train_number' => 'KA ' . $i,
                    'economy_seat_number' => $request->economy_seat_number,
                    'business_seat_number' => $request->business_seat_number,
                    'executive_seat_number' => $request->executive_seat_number,
                    'locomotive_type' => $request->locomotive_type
                ]);
            }
        }

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
