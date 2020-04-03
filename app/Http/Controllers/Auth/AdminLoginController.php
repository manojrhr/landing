<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\MessageBag;


class AdminLoginController extends Controller
{
	public function __contruct()
	{
		$this->middleware('guest:admin');
	}

  public function showLoginForm(){
  	return view('auth/admin-login');
  }

  public function login(Request $request){
  	
  	$this->validate($request,[
  		'email' => 'required|email',
  		'password' => 'required|min:6'
  	]);

  	if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
  		return redirect()->intended(route('admin.dashboard'));
  	}

	$errors = new MessageBag(['email' => ['Email and/or password invalid.']]); // if Auth::attempt fails (wrong credentials) create a new message bag instance.
  	return redirect()->back()->withInput($request->only('email','remember'))->withErrors($errors);
  }
}
