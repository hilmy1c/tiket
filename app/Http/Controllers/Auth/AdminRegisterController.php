<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RedirectsUsers;

class AdminRegisterController extends Controller
{
	use RedirectsUsers;

	protected $redirectTo = '/admin/home';

    public function __construct()
    {
    	$this->middleware('guest:admin');
    }

    public function index()
    {
    	return view('auth.admin-register');
    }

    public function register(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
    	]);

    	$user = Admin::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password),
    	]);

    	Auth::guard('admin')->login($user);

    	return redirect($this->redirectPath())->with('status', 'Berhasil login!');
    }
}
