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
}
