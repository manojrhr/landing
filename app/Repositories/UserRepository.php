<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Log;
use Image;
use Storage;
use Validator;

class UserRepository {

	public static function update($request) {

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'password' => 'string',
            'avatar' => 'image:jpeg,png,jpg|max:2048',
            'phone' => 'image:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {

            $errors = implode(',', $validator->messages()->all());

            $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }
        $m_c_code = $request->c_code !='' ? $request->c_code : '+1';

        $user = $request->user();
        $user->name = $request->name;
        $user->phone = $m_c_code.$request->phone;
        $user->password = bcrypt($request->password);

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            $photo = Image::make($avatar)->resize(300, 300)->save(public_path('images/avatar/'.$filename));

            $user->avatar = 'images/avatar/'.$filename;
        }

        if($user->save()){
            $response_array = ['success' => true, 'message' => 'Profile successfully updated!'];
        } else {
            $response_array = ['success' => false, 'message' => 'Something went wrong!'];
        }
        return $response_array;
	}

}