<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
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
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.booking.index', compact('bookings'));
    }
    

    public function delete($id, Request $request)
    {
        $user = Booking::findOrFail($id);
        $user->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Jet Ski Deleted Successfully.');
        return Redirect::back();
    }

    public function save(Request $request)
    {
        $response_array = BookingRepo::create($request)->getData();
        
        if($response_array->success){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Booking Inquiry submitted successfully!');
            return redirect('/user/profile');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $response_array->message);
            return Redirect::back()->withInput($request->input());
        }
    	return $response_array;
    }
}
