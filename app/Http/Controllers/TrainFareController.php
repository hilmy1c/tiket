<?php

namespace App\Http\Controllers;

use App\TrainFare;
use App\TrainJourney;
use Illuminate\Http\Request;

class TrainFareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['train_fares'] = TrainFare::all();
        return view('train_fare.train_fare', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['train_journey'] = TrainJourney::find($id);

        return view('train_fare.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TrainFare::insert([
            [
                'train_journey_id' => $request->train_journey_id,
                'class' => 'economy',
                'passenger' => 'adult',
                'fare' => $request->economy_adult,
            ],
            [
                'train_journey_id' => $request->train_journey_id,
                'class' => 'economy',
                'passenger' => 'baby',
                'fare' => $request->economy_baby,
            ],
            [
                'train_journey_id' => $request->train_journey_id,
                'class' => 'business',
                'passenger' => 'adult',
                'fare' => $request->business_adult,
            ],
            [
                'train_journey_id' => $request->train_journey_id,
                'class' => 'business',
                'passenger' => 'baby',
                'fare' => $request->business_baby,
            ],
            [
                'train_journey_id' => $request->train_journey_id,
                'class' => 'executive',
                'passenger' => 'adult',
                'fare' => $request->executive_adult,
            ],
            [
                'train_journey_id' => $request->train_journey_id,
                'class' => 'executive',
                'passenger' => 'baby',
                'fare' => $request->executive_baby,
            ],
        ]); 

        return redirect()->route('train_fare.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['train_fare'] = TrainFare::find($id);
        return view('train_fare.edit', $data);
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
        TrainFare::find($id)->update([
            'class'=>$request->class,
            'train_number'=>$request->train_number,
            'fare'=>$request->fare
        ]); 

        return redirect()->route('train_fare.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TrainFare::where('id', $id)->delete();
    }
}
