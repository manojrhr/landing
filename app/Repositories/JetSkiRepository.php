<?php

namespace App\Repositories;

use App\JetSki;
use Image;
use Validator;

class JetSkiRepository {

    public static function create($request) 
    {
    	$validator = Validator::make($request->all(), [
    		'title' => 'required|string|min:5|max:180|unique:jet_skis,title',
    		'description' => 'required|string',
            'price' => ['required', 'numeric'],
    		'captain' => 'numeric',
    		'capacity' => 'required',
    		'lat' => 'required',
    		'long' => 'required',
    		'city' => 'required',
    		'state' => 'required',
    		'country' => 'required',
		]);
		
        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
		}
		
		$data = array();
		if($request->images && count($request->images) > 0)
		{
			$i = 1;
			foreach($request->file('images') as $image)
			{
				$filename = uniqid('ski_').'.'. $image->getClientOriginalExtension();
				$photo = Image::make($image)->resize(1500, 600)->save(public_path('images/jetski/'.$filename));
				$data[] = '/images/jetski/'.$filename;  
				$i++;
			}
		}

    	$jetski = new JetSki([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
    		'captain' => $request->captain,
    		'capacity' => $request->capacity,
    		'images' => json_encode($data),
    		'lat' => $request->lat,
    		'long' => $request->long,
    		'city' => $request->city,
    		'state' => $request->state,
    		'country' => $request->country,
    		'user_id' => $request->user()->id,
    	]);

    	$jetski->save();

    	return response()->json([
    		'success' => true,
    		'message' => 'Jet Ski successfully added!'
    	], 201);
	}

}