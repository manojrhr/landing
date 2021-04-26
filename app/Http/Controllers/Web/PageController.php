<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

class PageController extends Controller
{
    public function show($slug,Request $request)
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
}
