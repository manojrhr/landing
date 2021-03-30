<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JetSki;

class JetskiController extends Controller
{
    public function index()
    {
        // $rows = array([],[],[],[],[],[]);
        // $rows = JetSki::all();
        return view('web.listing');
    }

    public function details($slug)
    {
        $jetski = JetSki::where('slug', '=', $slug)->first();
        if(!$jetski){
            abort(404);
        }
        // dd($jetski);
        return view('web.details', compact('jetski'));
    }
}
