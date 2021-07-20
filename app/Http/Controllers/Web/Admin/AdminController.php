<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Redirect;

class AdminController extends Controller
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
        $user_count = User::where('delivery_guy', false)->count();
        $d_guy_count = User::where('delivery_guy', true)->count();
        return view('admin.dashboard', compact('user_count','d_guy_count'));
    }

    public function markAllasRead(Request $request)
    {
        // dd(Auth::user()->name);
        Auth::user()->unreadNotifications->markAsRead();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Marked all notification as readed.');
        return Redirect::back();
    }
}
