<?php

namespace App\Http\Controllers\Web\Admin;

use App\AirportTransfer;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Validator;

class TransferController extends Controller
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


    public function index()
    {
        // $categories = Category::all(['id', 'title', 'subtitle']);
        // $subcategories = SubCategory::all(['id', 'title', 'subtitle']);
        // $tour = Tour::findOrFail($id);
        $shareds = AirportTransfer::where('type', 'shared')->get();
        $private = AirportTransfer::where('type', 'private')->get();
        $locations = Location::all();
        // $options = TourOption::with('location')->where('tour_id',$tour->id)->get();
        return view('admin.transfers.airport', compact('locations', 'shareds', 'private'));
    }

    public function storeShared(Request $request)
    {
        if($request->type === "shared"){
            $validator = Validator::make($request->all(), [
                'location' => ['required'],
                'price_pax' => ['required','integer']
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'location' => ['required'],
                'private_options' => ['required']
            ]);
        }
        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $response = ['success' => false, 'message' => $errors];
            return json_encode($response);
        }
        $check = AirportTransfer::where('location_id', $request->location)->where('type', $request->type)->first();
        if($check){
            // $response = ['success' => false, 'message' => 'Price for this location is already exist. Please update that one.'];
            // return json_encode($response);
            $option = $check;
        } else {
            $option = new AirportTransfer();
        }
        $option->type = $request->type;
        $option->location_id = $request->location;
        if($request->type === "shared"){
            $option->price_pax = $request->price_pax;
        } else {
            $option->private_options = $request->private_options;
        }
        
        if($option->save())
        {
            $response = ['success' => true, 'message' => 'Price for Airport Transfer added successfully.'];
        } else {
            $response = ['success' => false, 'message' => 'Something went wrong.'];
        }
        return json_encode($response);
    }
}
