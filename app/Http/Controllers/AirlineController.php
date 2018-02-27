<?php

namespace App\Http\Controllers;

use App\Airline;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['airlines'] = Airline::all();

        return view('airline.airline', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airline.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png|max:1000'
        ]);

        $path = $request->file('image')->store('public/img');

        Airline::create([
            'image' => $path,
            'code' => $request->code,
            'name' => $request->name
        ]);

        return redirect()->route('airline.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['airline'] = Airline::find($id);

        return view('airline.edit', $data);
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

        if ($request->file('image') != null) {
            $path = $request->file('image')->store('public/img');
            
            Airline::find($id)->update([
                'code' => $request->code,
                'name' => $request->name,
                'image' => $path
            ]);
        } else {
            Airline::find($id)->update([
                'code' => $request->code,
                'name' => $request->name
            ]);
        }

        return redirect()->route('airline.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Airline::destroy($id);

        return redirect()->route('airline.index');
    }
}
