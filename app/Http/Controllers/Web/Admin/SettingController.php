<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Redirect;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function updateAdminEmail(Request $request)
	{
		$user = Auth::user();
		$user->email = $request->email;
		$user->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Marked all notification as readed.');
        return Redirect::back();
		
	}

	public function getEmailUpdate(Request $request)
	{
		return view('admin.setting.emailupdate');
	}
}
