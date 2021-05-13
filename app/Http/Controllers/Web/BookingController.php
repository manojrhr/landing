<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use App\JetSki;
use App\Booking;
use Redirect;
use App\Repositories\BookingRepository as BookingRepo;
use DateTime;
use Validator;
use Stripe\Exception\ApiErrorException;

class BookingController extends Controller
{
	protected $stripeClient;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StripeClient $stripeClient)
    {
        $this->middleware(['auth:web', 'verified']);
    	$this->stripeClient = $stripeClient;
    }

    public function index($slug)
    {
        $jetski = JetSki::with(['user'])->where('slug', '=', $slug)->first();
        if(!$jetski){
            abort(404);
        }
        if(Auth::check() && Auth::user()->id == $jetski->user_id){
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', "You cannot book your own Jet Ski");
            return Redirect::route('user.profile');
        }
        return view('web.booking', compact('jetski'));
    }

    public function save(Request $request, $slug)
    {        
        $time_input = $request->pickup_time;
        $request->pickup_time = DateTime::createFromFormat( 'H:i', $time_input)->format( 'H:i:s');
        // dd($request->pickup_time);
        $response_array = BookingRepo::create($request, $slug)->getData();

        if($response_array->success){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Booking Inquiry submitted successfully.!');
            return Redirect::route('payment',$response_array->booking->uid);
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $response_array->message);
            return Redirect::back()->withInput();
        }
    }

    public function payment($uid)
    {
        $booking = Booking::where('uid', $uid)->with(['jetski', 'seller'])->first();
        if($booking->payment_success && $booking->charge_id){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Booking payment is already done.');
            return Redirect::route('user.profile');
        }
        // dump($booking->jetski);
        // dd($booking);
        return view('web.payment', compact('booking'));
    }

    public function charge($uid, Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'token' => 'required | string',
		]);
		
        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }
        
        $booking = Booking::where('uid', $uid)->with(['jetski', 'seller'])->first();
        if($booking->payment_success && $booking->charge_id){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Booking payment is already done.');
            return Redirect::route('user.profile');
        }

        $admin_charges = admin_charges();
        $seller_percent = 100-$admin_charges;
        $seller_amount = ((int)$booking->amount*100)*$seller_percent/100;

// dump($booking->seller->stripe_connect_id);
// dump($admin_charges);
// dump($seller_amount);
// dump($booking->seller->completed_stripe_onboarding);
// dump($request->token);
// dump((int)$booking->amount);
// dump((int)$booking->amount*100);
// dd($request);

        if(!$booking->seller->completed_stripe_onboarding){
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Cannot book this Jet Ski. Please try other one');
            return Redirect::back();
        }

        try{
            $charge = $this->stripeClient->charges->create([
                'amount' => (int)$booking->amount*100,
                'currency' => 'cad',
                'source' => $request->token,
                'description' => 'payment done for booking id '.$booking->id,
            ]);
        }catch(ApiErrorException $exception){
            abort(500, $exception->getMessage());
            return;
        }

        $booking->update(['charge_id' => $charge->id, 'payment_success' => true]);
        // $booking->update(['payment_success' => true]);
        $booking->fresh();

        try{
            $this->stripeClient->transfers->create([
                'amount' => $seller_amount,
                'currency' => 'cad',
                'source_transaction' => $charge->id,
                'destination' => $booking->seller->stripe_connect_id,
            ]);
        }catch(ApiErrorException $exception){
            abort(500, $exception->getMessage());
            return;
        }
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Booking payment is succesful.');
        return Redirect::route('user.profile');
    }
}
