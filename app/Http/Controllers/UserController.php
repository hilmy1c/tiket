<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()	
    {
    	$data['kucing'] = User::all();

    	return view('user', $data);
    }

    public function edit($id)
    {
    	$data['zeeber'] = User::find($id)->first();

    	return view('edit', $data);
    }
}
