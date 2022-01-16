<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use App\Tour;
use App\TourOption;
use App\ToursZonePrices;
use App\Zone;
use DB;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function tours()
    {
        // $tours = Tour::all();
        $cat = Category::where('slug', 'tours')->first();
        return view('web.tour.tour-list', compact('cat'));
    }

    public function single($slug)
    {
        $tour = Tour::where('slug', $slug)->where('active', true)->first();
        
        // $ids = AirportTransfer::select('location_id')->groupBy('location_id')->pluck('location_id')->toArray();
        // $locations = Location::whereIn('id', $ids)->get();

        // $zone_id = DB::table('tours_zone_price')
        //                 ->select('zone_id')
        //                 ->groupBy('zone_id')
        //                 ->pluck('zone_id')
        //                 ->toArray();
        $zones = ToursZonePrices::where('tour_id', $tour->id)
                                ->groupBy('zone_id')
                                ->get();
        // dd($zones->pluck('zone_id')->toArray());
        $zoneIds = $zones->pluck('zone_id')->toArray();
        $more_tours = Tour::whereHas('zone', function($q) use($zoneIds) {
                        $q->whereIn('id', $zoneIds);
                    })->take(4)->get();
        // dd($mTour);
        // $zones = Zone::whereIn('id', $zone_id)->get();
        if(!$tour){
            abort(404);
        }
        // $more_tours = Tour::where('id', '!=' , $tour->id)->take(4)->orderBy('id', 'desc')->get();
        // $more_tours = Tour::where('id', '!=' , $tour->id)->take(4)->orderBy('id', 'desc')->get();
        $options = TourOption::where('tour_id', $tour->id)->get();
        return view('web.tour.single', compact('tour', 'options', 'more_tours','zones'));
    }

    public function get_prices(Request $request)
    {
        // dump($request->all());
        $option = ToursZonePrices::where(['tour_id' => $request->tour_id, 'zone_id' => $request->location_id])->first();
        // dd($option);
        if($option){
            $child_rate = ($option->child_price_percentage / 100) * $option->cost_per_adult;
            $option->child_rate = round($child_rate);
            $response = ['success' => true, 'option' => $option];
        } else {
            $response = ['success' => true, 'message' => 'Tour not available for selected location'];
        }
        return json_encode($response);
    }
}
