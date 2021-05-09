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
        return view('web.listing');
    }

    public function details($slug)
    {
        $jetski = JetSki::with(['user'])->where('slug', '=', $slug)->first();
        if(!$jetski){
            abort(404);
        }
        
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
        if(!Auth::user()->completed_stripe_onboarding){
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Please complete your stripe onboarding first!');
            return Redirect::route('user.profile');
        }

        $cancel_policies = DB::table('cancel_policies')->get();
        return view('web.registerJetSki', compact('cancel_policies'));
    }

    public function saveJetSki(Request $request)
    {
        $response_array = JetSkiRepo::create($request)->getData();
        
        if($response_array->success){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Jet Ski added successfully!');
            return redirect('/user/seller/jetski');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $response_array->message);
            return Redirect::back()->withInput($request->input());
        }
    	return $response_array;
    }
                            
    public function nearByJetski(Request $request)
    {
        // dd($request->all());

        $latitude       =       $request->lat;
        $longitude      =       $request->long;

        $rows          =       JetSki::select(DB::raw('*, ( 6367 * acos( cos( radians('.$latitude.') ) 
                                                * cos( radians( latitude ) ) * cos( radians( longitude ) 
                                                - radians('.$longitude.') ) + sin( radians('.$latitude.') ) 
                                                * sin( radians( latitude ) ) ) ) AS distance'))
                                    ->having('distance', '<', 25)
                                    ->orderBy('distance')
                                    ->get();

        return view('web.nearby', compact("rows"));
    }
}
