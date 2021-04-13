<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug,Request $request)
    {
      $data = array();
      $static_page_names =  ['privacy_policy','terms_of_service.blade']; //array that contains all static pages name
      if(in_array($slug, $static_page_names)){
        //static page code here 
        return view('web.pages.'.$slug,$data);
      }else{
          abort(404);
      }
    }
}
