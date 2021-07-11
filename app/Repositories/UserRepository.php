<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Log;
use Hash;
use Image;
use Storage;
use Validator;

class UserRepository {

	public static function update($request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'string',
            'avatar' => 'image:jpeg,png,jpg|max:2048',
            'phone' => 'required|integer',
            'new_confirm_password' => 'same:new_password'
        ], $messages = [
            'new_confirm_password.same' => 'New Password and Confirm Password must be same.',
        ]);

        if ($validator->fails()) {

            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

        $m_c_code = $request->c_code !='' ? $request->c_code : '+1';

        $user = $request->user();
        $user->name = $request->name;
        $user->phone = $m_c_code.$request->phone;

        if($request->has('new_password') && $request->current_password != "" && $request->new_password != "") {
            // dd((Hash::check($request->current_password, $user->password)));
            if(Hash::check($request->current_password, $user->password)) {
                $user->password = bcrypt($request->new_password);
            } else {
                return $response_array = ['success' => false , 'message' => "Password Not Matched", 'error_code' => 101];
            }
        }

        if($request->has('about')){
            $user->about = $request->about;
        }
        
        if($request->hasFile('avatar')){
            if(!$user->avatar === 'images/avatar/default.jpg')
            {
                unlink($user->avatar);
            }
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

    /*
    *   Verify User OTP
    *
    */    
	public static function verifyOTP($request) {

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'otp' => 'string|min:6|max:6',
        ], $messages = [
            'id.required' => 'User Not Valid.',
            'otp.min' => 'OTP should be minimum of 6 characters.',
            'otp.max' => 'OTP should be maximum of 6 characters.',
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

        $user = User::find($request->id);
        if($user->otp == $request->otp)
        {
            $user->phone_verified_at = \Carbon\Carbon::now();
            $user->save();
            $response_array = ['success' => true, 'message' => 'Phone number verified successfully.'];
        } else {
            $response_array = ['success' => false, 'message' => 'OTP is not valid. Please enter valid OTP'];
        }
        return $response_array;
    }
}