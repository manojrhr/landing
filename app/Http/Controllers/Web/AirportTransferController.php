<?php

namespace App\Http\Controllers\Web;

use App\AirportTransfer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AirportTransferController extends Controller
{
    public function get_prices(Request $request)
    {
        // dump($request->all());
        $option = AirportTransfer::where(['type' => $request->type, 'location_id' => $request->location_id])->first();
        // dd($option);
        if($option){
            $response = ['success' => true, 'option' => $option];
        } else {
            $response = ['success' => true, 'message' => 'Price not available for selected location'];
        }
        return json_encode($response);
    }
}
