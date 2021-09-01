<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use Redirect;
use App\Repositories\BookingRepository as BookingRepo;
use App\Tour;
use DateTime;
use Validator;
use Stripe\Exception\ApiErrorException;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth:web', 'verified']);
    }

    public function index($slug)
    {

    }

    public function save($slug, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location_id' => 'required|integer',
            'date' => 'required',
            'adult_rate' => 'required|integer',
            'child_rate' => 'required|integer',
            'amount' => 'required|integer',
            'adult_count' => 'required|integer',
            'child_count' => 'required|integer'
        ], $messages = [
            'location_id.required' => 'Something went wrong. Please refresh the page.',
            'date.required' => 'Something went wrong. Please refresh the page.',
            'adult_rate.required' => 'Something went wrong. Please refresh the page.',
            'child_rate.required' => 'Something went wrong. Please refresh the page.',
            'amount.required' => 'Something went wrong. Please refresh the page.',
            'adult_count.required' => 'Number of adults required.',
            'child_count.required' => 'Number of childs required.',
            
            'location_id.integer' => 'Something went wrong. Please refresh the page.',
            'adult_rate.integer' => 'Something went wrong. Please refresh the page.',
            'child_rate.integer' => 'Something went wrong. Please refresh the page.',
            'amount.integer' => 'Something went wrong. Please refresh the page.',
            'adult_count.integer' => 'Number of adults are invalid.',
            'child_count.integer' => 'Number of childs are invalid.',
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }

        $tour = Tour::where('slug', $slug)->first();
        if(!$tour){
            abort(404);
        }
        
        $adult_total = $request->adult_count * $request->adult_rate;
        $child_total = $request->child_count * $request->child_rate;
        $total_amount = $adult_total + $child_total;
        if ($total_amount != $request->amount) {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong. Please refresh the page.');
            return Redirect::back();
        }

        $booking = new Booking();
        $booking->tour_id = $tour->id;
        // $booking-> = $request->
        $booking->location_id = $request->location_id;
        $booking->date = $request->date;
        $booking->adult_rate = $request->adult_rate;
        $booking->child_rate = $request->child_rate;
        $booking->total_amount = $request->amount;
        $booking->adult_count = $request->adult_count;
        $booking->child_count = $request->child_count;
        if($request->has('pickup_info')){
            $booking->pickup_info = $request->pickup_info;
        }
        $booking->save();

        if($booking->save()){
            return Redirect::route('checkout', $slug);
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
            return Redirect::back()->withInput();
        }
    }

    public function checkout($slug)
    {
        return view('web.booking.checkout');
    }
}