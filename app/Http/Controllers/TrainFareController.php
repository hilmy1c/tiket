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
        $data['train_fares'] = TrainFare::with('trainJourney')->get();
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
        $array = [];
        $i = 0;

        if ($request->economy_adult != "") {
            $array[$i]['train_journey_id'] = $request->train_journey_id;
            $array[$i]['class'] = 'economy';
            $array[$i]['passenger'] = 'adult';
            $array[$i]['fare'] = $request->economy_adult;
            $i++;
        }

        if ($request->economy_baby != "") {
            $array[$i]['train_journey_id'] = $request->train_journey_id;
            $array[$i]['class'] = 'economy';
            $array[$i]['passenger'] = 'baby';
            $array[$i]['fare'] = $request->economy_baby;
            $i++;
        }

        if ($request->business_adult != "") {
            $array[$i]['train_journey_id'] = $request->train_journey_id;
            $array[$i]['class'] = 'business';
            $array[$i]['passenger'] = 'adult';
            $array[$i]['fare'] = $request->business_adult;
            $i++;
        }

        if ($request->business_baby != "") {
            $array[$i]['train_journey_id'] = $request->train_journey_id;
            $array[$i]['class'] = 'business';
            $array[$i]['passenger'] = 'baby';
            $array[$i]['fare'] = $request->business_baby;
            $i++;
        }

        if ($request->executive_adult != "") {
            $array[$i]['train_journey_id'] = $request->train_journey_id;
            $array[$i]['class'] = 'executive';
            $array[$i]['passenger'] = 'adult';
            $array[$i]['fare'] = $request->executive_adult;
            $i++;
        }

        if ($request->executive_baby != "") {
            $array[$i]['train_journey_id'] = $request->train_journey_id;
            $array[$i]['class'] = 'executive';
            $array[$i]['passenger'] = 'baby';
            $array[$i]['fare'] = $request->executive_baby;
            $i++;
        }

        TrainFare::insert($array); 

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
