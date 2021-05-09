<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JetSki;
use Redirect;
use App\Repositories\BookingRepository as BookingRepo;
use DateTime;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index($slug)
    {
        $jetski = JetSki::with(['user'])->where('slug', '=', $slug)->first();
        if(!$jetski){
            abort(404);
        }
        return view('web.booking', compact('jetski'));
    }

    public function save(Request $request, $slug)
    {
        if($request->total_amount == 0){
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', "Something wrong with you booking. Please try again.");
            return Redirect::back()->withInput();
        }
        
        $time_input = $request->pickup_time;
        $request->pickup_time = DateTime::createFromFormat( 'H:i', $time_input)->format( 'H:i:s');
        // dd($request->pickup_time);
        $response_array = BookingRepo::create($request, $slug)->getData();

        if($response_array->success){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Booking Inquiry submitted successfully.!');
            return redirect('/user/profile');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $response_array->message);
            return Redirect::back()->withInput();
        }
    }
}
