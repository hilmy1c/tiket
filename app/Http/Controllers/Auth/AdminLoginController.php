<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\RedirectsUsers;

class AdminLoginController extends Controller
{
	use RedirectsUsers;

	protected $redirectTo = '/admin/home';

    public function __construct()
    {
    	$this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {
    	$request->validate([
    		'email' => 'required|string|email',
            'password' => 'required|string',
    	]);

    	if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
    		return redirect()->intended($this->redirectPath());
    	}

    	throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
