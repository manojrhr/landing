<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function single()
    {
        $tour = Tour::find(1);
        return view('web.tour.single', compact('tour'));
    }
}
