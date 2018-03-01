<?php

namespace App\Http\Controllers;

use App\User;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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
        $userId = User::find($id);

        $data['train_bookings'] = Booking::whereHas('bookingDetail', function ($query) {
            $query->where('train_journey_id', '!=', null);
        })->where('user_id', $userId->id)->get();

        $data['flight_bookings'] = Booking::whereHas('bookingDetail', function ($query) {
            $query->where('flight_number', '!=', null);
        })->where('user_id', $userId->id)->get();

        return view('user-booking-list', $data);
    }

    public function account($id)
    {
        $data['user'] = User::find($id);

        return view('my-account', $data);
    }

    public function updateProfile(Request $request, $id)
    {
        User::find($id)->update($request->all());

        echo json_encode('Ubah');
    }

    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        Password::broker()->reset($request->only(''));
    }
}
