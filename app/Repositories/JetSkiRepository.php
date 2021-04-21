<?php

namespace App\Repositories;

use App\JetSki;
use Image;
use Validator;
use App\Events\NewJetSkiAddedEvent;

class JetSkiRepository {

    public static function create($request) 
    {
    	$validator = Validator::make($request->all(), [
    		'title' => 'required|string|min:5|max:180|unique:jet_skis,title',
    		'description' => 'required|string',
            'price' => ['required', 'numeric'],
    		'captain' => 'numeric',
    		'price_unit' => 'required',
    		'make_id' => 'required | numeric',
    		'model_id' => 'required | numeric',
    		'year' => 'required | numeric',
    		'insurance' => 'required',
    		'cancel_policy_id' => 'required | numeric',
    		'capacity' => 'required',
    		'lat' => 'required',
    		'long' => 'required',
    		'city' => 'required',
    		'state' => 'required',
    		'country' => 'required',
		]);
		
        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
			$response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
			return response()->json($response_array);
		}
		
		$images_data = array();
		if($request->images && count($request->images) > 0)
		{
			$i = 1;
			foreach($request->file('images') as $image)
			{
				$filename = uniqid('ski_').'.'. $image->getClientOriginalExtension();
				if($i==1){
					$main_image_name = '/images/jetski/'.$filename;
					$main_image = Image::make($image)->resize(362.2, 241.47)->save(public_path('images/jetski/'.$filename));
				}
				$photo = Image::make($image)->resize(1500, 600)->save(public_path('images/jetski/'.$filename));
				$images_data[] = '/images/jetski/'.$filename;  
				$i++;
			}
		}
// dump($images_data);
// dd($main_image_name);
    	$jetski = new JetSki([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'price_unit' => $request->price_unit,
            'make_id' => $request->make_id,
            'model_id' => $request->model_id,
            'year' => (int)$request->year,
            'insurance' => $request->insurance,
            'cancel_policy_id' => $request->cancel_policy_id,
    		'captain' => $request->captain,
    		'capacity' => $request->capacity,
    		'image' => $main_image_name,
    		'images' => json_encode($images_data),
    		'latitude' => $request->lat,
    		'longitude' => $request->long,
    		'city' => $request->city,
    		'state' => $request->state,
    		'country' => $request->country,
    		'user_id' => $request->user()->id,
    	]);

    	$jetski->save();
		
		event(new NewJetSkiAddedEvent($jetski));

    	return response()->json([
    		'success' => true,
    		'message' => 'Jet Ski successfully added!'
    	], 201);
	}

}