<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use App\Pages;

class PageController extends Controller
{
    public function show($slug, Request $request)
    {
      $static_page_names = Storage::disk('static_pages')->files('');

      $data = array();

      if(in_array($slug.".blade.php", $static_page_names)){
        //static page code here 
        return view('web.pages.'.$slug,$data);
      }else{
          abort(404);
      }
    }

    public function view_page($slug)
    {
        $landing = Pages::where('slug',$slug)->first();
        // dd($landing->page_name);
        return view('landing.ecom-lander', compact('landing'));
    }

    public function api(Request $request)
    {
      $coupon = $request->coupon;
      
      switch ($coupon) {
          case "my Coupon":
              echo "10";
              break;
          case "ABC10":
              echo "1.99";
              break;
          case "THIRTY":
              echo "30";
              break;
          default:
             echo "false";
      }
    }
}
