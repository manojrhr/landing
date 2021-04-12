<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use DB;
use Auth;
use App\JetSki;
use App\Make;
use App\Models;
use App\Repositories\JetSkiRepository as JetSkiRepo;

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

    public function addJetSki(Request $request)
    {
        // if(!Auth::user()->completed_stripe_onboarding){
        //     $request->session()->flash('message.level', 'error');
        //     $request->session()->flash('message.content', 'Please complete your stripe onboarding first!');
        //     return Redirect::route('user.profile');
        // }

        $cancel_policies = DB::table('cancel_policies')->get();
        return view('web.registerJetSki', compact('cancel_policies'));
    }

    public function saveJetSki(Request $request)
    {
        // dump((int)$request->year);
        // dd($request->all());
        $response_array = JetSkiRepo::create($request);
        // $response_array = json_decode($response_array);
        if($response_array['success'] === true){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Jet Ski added successfully!');
            return redirect('/user/profile');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $response_array['message']);
            return Redirect::back();
        }
    	return $response_array;
    }
}
