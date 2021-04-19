<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JetSki;
use Redirect;
use App\Repositories\BookingRepository as BookingRepo;

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
        return view('web.booking');
    }

    public function save(Request $request, $slug)
    {
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
