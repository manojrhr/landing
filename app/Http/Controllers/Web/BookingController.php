<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Hotel;
use App\Location;
use Redirect;
use App\Repositories\BookingRepository as BookingRepo;
use App\Tour;
use App\Zone;
use DateTime;
use Validator;
use Session;
use Auth;
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
            'amount' => 'required',
            'adult_count' => 'required',
            'child_count' => 'required'
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
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }

        if($slug === "transfers"){
            $booking['tour_id'] = 0;
        } else {
            $tour = Tour::where('slug', $slug)->first();
            $booking['tour_id'] = $tour->id;
            if(!$tour){
                abort(404);
            }
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
        // $booking['booking_id'] = $booking_id;
        $booking['location_id'] = (int)$request->location_id;
        $booking['hotel_id'] = (int)$request->hotel_id;
        $booking['date'] = date('Y-m-d', strtotime($request->date));
        $booking['adult_rate'] = (int)$request->adult_rate;
        $booking['child_rate'] = (int)$request->child_rate;
        $booking['total_amount'] = number_format($request->amount, 2);
        $booking['adult_count'] = number_format($request->adult_count, 2);
        $booking['child_count'] = number_format($request->child_count, 2);
        if($request->has('pickup_info')){
            $booking['pickup_info'] = $request->pickup_info;
        }
        // $booking->save();
        $request->session()->forget('booking');
        $request->session()->push('booking', $booking);
        $request->session()->put('tour_slug', $slug);
        // dump($request->all());
        // dd(session()->all());
        return Redirect::route('checkout', $slug);

        // if($request->session()->push('booking', $booking)){
        //     return Redirect::route('checkout', [$booking->booking_id, $slug]);
        // } else {
        //     $request->session()->flash('message.level', 'error');
        //     $request->session()->flash('message.content', 'Something went wrong.');
        //     return Redirect::back()->withInput();
        // }
    }

    public function transfer($slug, Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'zone_id' => 'required|integer',
            'date' => 'required',
            'adult_price' => 'required|integer',
            'child_price' => 'required|integer',
            'amount' => 'required',
            'adult_count' => 'required',
            'child_count' => 'required'
        ], $messages = [
            'zone_id.required' => 'Something went wrong. Please refresh the page.',
            'date.required' => 'Something went wrong. Please refresh the page.',
            'adult_rate.required' => 'Something went wrong. Please refresh the page.',
            'child_rate.required' => 'Something went wrong. Please refresh the page.',
            'amount.required' => 'Something went wrong with Amount. Please refresh the page.',
            'adult_count.required' => 'Number of adults required.',
            'child_count.required' => 'Number of childs required.',
            
            'zone_id.integer' => 'Something went wrong. Please refresh the page.',
            'adult_rate.integer' => 'Something went wrong. Please refresh the page.',
            'child_rate.integer' => 'Something went wrong. Please refresh the page.',
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }

        $booking['tour_id'] = 0;
        $adult_total = $request->adult_count * $request->adult_rate;
        $child_total = $request->child_count * $request->child_rate;
        $total_amount = $adult_total + $child_total;
        
        // if ($total_amount != $request->amount) {
        //     $request->session()->flash('message.level', 'error');
        //     $request->session()->flash('message.content', 'Something went wrong. Please refresh the page.');
        //     return Redirect::back();
        // }
        // $latest_booking = Booking::latest()->first();
        // if($latest_booking){
        //     $booking_id = $latest_booking->booking_id + 1;
        // } else {
        //     $booking_id = 10001;
        // }

        // $booking[];
        // $booking['booking_id'] = $booking_id;
        $booking['location_id'] = (int)$request->zone_id;
        $booking['hotel_id'] = (int)$request->hotel_id;
        $booking['date'] = date('Y-m-d', strtotime($request->date));
        $booking['adult_rate'] = (int)$request->adult_rate;
        $booking['child_rate'] = (int)$request->child_rate;
        $booking['total_amount'] = number_format($request->amount, 2);
        $booking['adult_count'] = number_format($request->adult_count, 2);
        $booking['child_count'] = number_format($request->child_count, 2);
        if($request->has('pickup_info')){
            $booking['pickup_info'] = $request->pickup_info;
        }
        // $booking->save();
        $request->session()->forget('booking');
        $request->session()->push('booking', $booking);
        $request->session()->put('tour_slug', $slug);
        // dump($request->all());
        // dd(session()->all());
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
        if(!$request->session()->get('booking')){
            return Redirect::route('tour.single',$slug);
        }
        $booking = (object)$request->session()->get('booking')[0];
        // dd($request->session());
        // $booking = Booking::where('booking_id', $booking_id)->firstOrFail();
        if($slug === "transfers"){
            $tour = new Tour();
        }else{
            $tour = Tour::where('slug', $slug)->firstOrFail();
        }
        // dd($booking->location_id);
        // dump('here1');
        $location = Zone::findOrFail($booking->location_id);
        // dump('here2');
        $hotel = Hotel::findOrFail($booking->hotel_id);
        // dump('here3');
        return view('web.booking.checkout', compact('booking', 'tour', 'location', 'hotel'));
    }

    public function paymentSuccess(Request $request)
    {
        // dump(Auth::user());
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