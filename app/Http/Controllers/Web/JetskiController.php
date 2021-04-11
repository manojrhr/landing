<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JetSki;
use App\Make;
use App\Models;

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
        $jetski = JetSki::with(['user'])->where('slug', '=', $slug)->first();
        if(!$jetski){
            abort(404);
        }
        // dd($jetski);
        return view('web.details', compact('jetski'));
    }

    function models( Request $request )
    {
        $this->validate( $request, [ 'id' => 'required|exists:makes,id' ] );
        $models = Models::where('make_id', $request->get('id') )->get();

        $output = [];
        foreach( $models as $model )
        {
            $output[$model->id] = $model->name;
        }
        return $output;
    }
}
