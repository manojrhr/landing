<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JetSki;
use Image;
use Validator;
use App\Repositories\JetSkiRepository as JetSkiRepo;

class SkijetController extends Controller
{
    public function create(Request $request)
    {
        $response_array = JetSkiRepo::create($request);
    	return $response_array;
    }
}
