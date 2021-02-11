<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository as UserRepo;

class UserController extends Controller
{
    public function update_profile(Request $request)
    {
        $response_array = UserRepo::update($request);
    	return response()->json($response_array, 201);
    }
    
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }
}
