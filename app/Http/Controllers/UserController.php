<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()	
    {
    	$data['users'] = User::all();

    	return view('user.user', $data);
    }

    public function edit($id)
    {
    	$data['user'] = User::find($id);

    	return view('user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('user.index');
    }

    public function bookingHistory($id)
    {
        $data['user'] = User::find($id);

        return view('user-booking-list', $data);
    }
}
