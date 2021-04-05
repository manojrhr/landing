<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Redirect;

class UserController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    

    public function delete($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'User Deleted Successfully.');
        return Redirect::back();
    }
}
