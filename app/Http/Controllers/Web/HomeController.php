<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\JetSki;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jetskies = JetSki::all()->take(6);
        // $jetskies = JetSki::select('id','slug','image','city','state','country')->groupBy('city')->get();
        return view('web.home', compact('jetskies'));
    }
}
