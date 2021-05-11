<?php

namespace App\Repositories;

use App\Booking;
use App\JetSki;
use App\User;
use Validator;
use App\Events\NewBookingEvent;

class BookingRepository {

    public static function create($request, $slug) 
    {
    	$validator = Validator::make($request->all(), [
    		'hours' => 'sometimes | numeric',
    		'minutes' => 'sometimes | numeric',
            'nights' => 'sometimes | numeric',
    		'checkin_date' => 'required',
    		'flex_start_date' => 'sometimes',
    		'flex_end_date' => 'sometimes',
    		'pickup_time' => 'required | string',
    		'adult' => 'required | numeric | min:1',
    		'senior' => 'sometimes | numeric',
    		'child' => 'sometimes | numeric',
    		'infants' => 'sometimes | numeric',
    		'visitor_message' => 'sometimes | string',
		]);
		
        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
			$response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
			return response()->json($response_array);
		}
		
        if($request->total_amount == 0){
			$response_array = ['success' => false , 'message' => "Something wrong with you booking. Please try again.", 'error_code' => 101];
			return response()->json($response_array);
		}
		$jetski = JetSki::where('slug', $slug)->first();
		$seller = User::find($jetski->user_id);
        if(!$seller->completed_stripe_onboarding){
			$response_array = ['success' => false , 'message' => "Sorry this Jet Ski is not available for booking right now.", 'error_code' => 101];
			return response()->json($response_array);
        }
		if($request->has('hours')){
			$amount = $request->hours * $jetski->price;
		}
		if($request->has('nights')){
			$amount = $request->nights * $jetski->price;
		}
        if($request->total_amount != $amount){
			$response_array = ['success' => false , 'message' => "Something wrong with you booking. Please try again.", 'error_code' => 101];
			return response()->json($response_array);
		}
		
    	$booking = new Booking([
            'uid' => uniqid('book_'),
            'jet_ski_id' => $jetski->id,
            'user_id' => $request->user()->id,
            'seller_id' => $jetski->user_id,
            'hours' => (int)$request->hours,
            'minutes' => (int)$request->minutes,
            'nights' => (int)$request->nights,
            'checkin_date' => $request->checkin_date,
            'flex_start_date' => $request->flex_start_date,
            'flex_end_date' => $request->flex_end_date,
            'pickup_time' => $request->pickup_time,
            'adults' => (int)$request->adult,
            'seniors' => (int)$request->senior,
            'children' => (int)$request->child,
    		'infants' => (int)$request->infants,
    		'visitor_message' => $request->visitor_message,
    		'amount' => $request->total_amount,
    	]);

		$booking->save();
		
		event(new NewBookingEvent($booking));

    	return response()->json([
    		'success' => true,
			'message' => 'Jet Ski successfully added!',
			'booking' => $booking
    	], 201);
	}

}