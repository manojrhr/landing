<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JetSki;
use App\Make;
use App\Models;
use DB;

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

    public function models( Request $request )
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

    public function addJetSki()
    {
        $cancel_policies = DB::table('cancel_policies')->get();
        return view('web.registerJetSki', compact('cancel_policies'));
    }

    public function saveJetSki(Request $request)
    {
        dd($request->all());
    }
}
