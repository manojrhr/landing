<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Image;
use Storage;

class UserController extends Controller
{
    public function update_profile(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string',
    		'password' => 'required|string',
    		'avatar' => 'required|image:jpeg,png,jpg|max:2048'
    	]);
    	$user = $request->user();
    	$user->name = $request->password;
    	$user->password = bcrypt($request->password);

    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() .'.'. $avatar->getClientOriginalExtension();
    		$photo = Image::make($avatar)->resize(300, 300)->save(public_path('images/avatar/'.$filename));

    		$user->avatar = $filename;
    	}

		$user->save();
    	return response()->json([
    		'success' => true,
    		'message' => 'Profile successfully updated!'
    	], 201);
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
