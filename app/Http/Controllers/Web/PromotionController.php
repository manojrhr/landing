<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tour;

class PromotionController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->limit(5)->get();
        return view('web.promotion.index', compact('tours'));
    }
}
