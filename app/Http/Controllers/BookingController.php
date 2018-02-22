<?php

namespace App\Http\Controllers;

use App\User;
use App\Flight;
use App\Booking;
use App\BankAccount;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Booking::create([
            'booking_code' => $request->booking_code,
            'user_id' => Auth::id(),
            'booking_date' => date('Y-m-d'),
            'is_paid' => false,
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
            'is_paid' => $request->is_paid
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

        return redirect()->back();
    }

    public function payment($id)
    {
        $data['booking'] = Booking::find($id);
        $data['bank_accounts'] = BankAccount::all();

        return view('booking-payment', $data);
    }

    public function trainPayment($id)
    {
        $data['booking'] = Booking::find($id);
        $data['bank_accounts'] = BankAccount::all();

        return view('train-booking-payment', $data);
    }

    public function getBankAccount(Request $request, $id)
    {
        Booking::find($id)->update([
            'bank_account_id' => $request->bank_id
        ]);

        $data['booking'] = Booking::find($id);

        return view('bank-account-detail', $data);
    }

    public function updatePaymentStatus($id)
    {
        Booking::find($id)->update([
            'payment_status' => 'Menunggu Konfirmasi'
        ]);

        return redirect()->route('user.booking_history', ['id' => Auth::id()]);
    }

    public function delete($id)
    {
        Booking::destroy($id);

        return redirect()->back();
    }

    public function detail($id)
    {
        $data['booking'] = Booking::find($id);

        return view('booking-detail', $data);
    }

    public function historyDetail($id)
    {
        $data['booking'] = Booking::find($id);

        return view('user-booking-detail', $data);
    }

    public function confirmPayment($id)
    {
        Booking::find($id)->update([
            'payment_status' => 'Sudah Dibayar'
        ]);

        return redirect()->back();
    }

    public function unconfirmPayment($id)
    {
        Booking::find($id)->update([
            'payment_status' => 'Belum Dibayar'
        ]);

        return redirect()->back();
    }

    public function cetakTiket($id)
    {
        // $pdf = PDF::setOptions(['isRemoteEnabled' => true]);
        // $pdf->loadView('e-tiket');
        // $pdf->setPaper('A4', 'potrait');
        // return $pdf->stream();
    }
}
