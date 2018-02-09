<?php

namespace App\Http\Controllers;

use App\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bank_accounts'] = BankAccount::all();

        return view('bank_account.bank_account', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank_account.create');
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

        BankAccount::create([
            'image' => $path,
            'owner' => $request->owner,
            'bank_name' => $request->bank_name,
            'account' => $request->account
        ]);

        return redirect()->route('bank_account.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['bank_account'] = BankAccount::find($id);

        return view('bank_account.edit', $data);
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
        if ($request->image != "") {
            $request->validate([
                'image' => 'required|mimes:jpeg,jpg,png|max:1000'
            ]);

            $path = $request->file('image')->store('public/img');

            BankAccount::find($id)->update([
                'image' => $path
            ]);
        }

        BankAccount::find($id)->update([
            'owner' => $request->owner,
            'bank_name' => $request->bank_name,
            'account' => $request->account
        ]);

        return redirect()->route('bank_account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BankAccount::destroy($id);

        return redirect()->route('bank_account.index');
    }
}
