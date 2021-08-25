<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Tour;
use App\TourOption;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function tours()
    {
        // $tours = Tour::all();
        return view('web.tour.tour-list');
    }

    public function single($slug)
    {
        $tour = Tour::where('slug', $slug)->first();
        if(!$tour){
            abort(404);
        }
        $options = TourOption::where('tour_id', $tour->id)->get();
        return view('web.tour.single', compact('tour', 'options'));
    }

    public function get_prices(Request $request)
    {
        // dump($request->all());
        $option = TourOption::where(['tour_id' => $request->tour_id, 'location_id' => $request->location_id])->first();
        // dd($option);
        if($option){
            $response = ['success' => true, 'option' => $option];
        } else {
            $response = ['success' => true, 'message' => 'Tour not available for selected location'];
        }
        return json_encode($response);
    }
}
