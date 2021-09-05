<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Location;
use Redirect;
use App\Repositories\BookingRepository as BookingRepo;
use App\Tour;
use DateTime;
use Validator;
use Session;
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

        // $latest_booking = Booking::latest()->first();
        // if($latest_booking){
        //     $booking_id = $latest_booking->booking_id + 1;
        // } else {
        //     $booking_id = 10001;
        // }

        // $booking[];
        $booking['tour_id'] = (int)$tour->id;
        // $booking['booking_id'] = $booking_id;
        $booking['location_id'] = (int)$request->location_id;
        $booking['date'] = date('Y-m-d', strtotime($request->date));
        $booking['adult_rate'] = (int)$request->adult_rate;
        $booking['child_rate'] = (int)$request->child_rate;
        $booking['total_amount'] = (int)$request->amount;
        $booking['adult_count'] = (int)$request->adult_count;
        $booking['child_count'] = (int)$request->child_count;
        if($request->has('pickup_info')){
            $booking['pickup_info'] = $request->pickup_info;
        }
        // $booking->save();
        $request->session()->forget('booking');
        $request->session()->push('booking', $booking);
        $request->session()->put('tour_slug', $slug);
        return Redirect::route('checkout', $slug);
        // if($request->session()->push('booking', $booking)){
        //     return Redirect::route('checkout', [$booking->booking_id, $slug]);
        // } else {
        //     $request->session()->flash('message.level', 'error');
        //     $request->session()->flash('message.content', 'Something went wrong.');
        //     return Redirect::back()->withInput();
        // }
    }

    public function checkout($slug, Request $request)
    {
        $booking = (object)$request->session()->get('booking')[0];
        // dd($booking);
        // $booking = Booking::where('booking_id', $booking_id)->firstOrFail();
        $tour = Tour::where('slug', $slug)->firstOrFail();
        $location = Location::findOrFail($booking->location_id);
        return view('web.booking.checkout', compact('booking', 'tour', 'location'));
    }

    public function paymentSuccess(Request $request)
    {
        // dump($request->session());
        $tour_slug = $request->session()->get('tour_slug');
        // dd($tour_slug);
        Session::flush();
        // dd($request->session());
        // $booking = (object)$request->session()->get('booking')[0];
        // // dd($booking);
        // // $booking = Booking::where('booking_id', $booking_id)->firstOrFail();
        // $tour = Tour::where('slug', $slug)->firstOrFail();
        // $location = Location::findOrFail($booking->location_id);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Payment success !!');
        return view('web.booking.success', compact('tour_slug'));
    }
}