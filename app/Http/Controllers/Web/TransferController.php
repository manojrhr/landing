<?php

namespace App\Http\Controllers\Web;

use App\AirportTransfer;
use App\Category;
use App\Hotel;
use App\Http\Controllers\Controller;
use App\Location;
use App\SubCategory;
use App\Zone;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $category = Category::where('slug', 'transfers')->first();
        $subcategories = SubCategory::where('category_id', $category->id)->get();
        // dd($subcategories->isEmpty());
        return view('web.transfers.index', compact('category','subcategories'));
    }

    public function transfers($slug)
    {
        // if($slug != 'shared-transfers')
        //     abort(404);
        $subcategory = SubCategory::where('slug',$slug)->first();
        $ids = AirportTransfer::select('location_id')->groupBy('location_id')->pluck('location_id')->toArray();
        $locations = Location::whereIn('id', $ids)->get();
        $zones = Zone::all();

        if($slug === 'luxury-transfers')
        {
            return view('web.transfers.luxury-index');
        }

        if (view()->exists('web.transfers.'.$slug)) {
                return view('web.transfers.'.$slug, compact('locations','subcategory','zones'));
        }else{
            abort(404);
        }
    }

    public function get_hotels(Request $request)
    {
        $data['hotels'] = Hotel::where("zone_id", $request->zone_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
}
