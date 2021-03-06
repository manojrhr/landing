<?php

namespace App\Http\Controllers\Web\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use App\Tour;
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
        return view('admin.dashboard');
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
