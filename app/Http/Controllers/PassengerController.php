<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passenger;

class PassengerController extends Controller
{
    public function index()
    {
        $data['passengers'] = Passenger::all();

        return view('passenger.passenger', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passenger.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Passenger::create([
            'book_det' => $request->book_det,
            'name' => $request->name,
            'id_no' => $request->id_no
        ]);

        return redirect()->route('passenger.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['passengers'] = Passenger::find($id);

        return view('passenger.edit', $data);
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
        Passenger::find($id)->update([
            'book_det' => $request->book_det,
            'name' => $request->name,
            'id_no' => $request->id_no
        ]);

        return redirect()->route('passenger.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Passenger::destroy($id);

        return redirect()->route('passenger.index');
    }
}
