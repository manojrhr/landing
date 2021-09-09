<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Address;
use Log;
use Hash;
use Image;
use Storage;
use Validator;

class UserRepository {

	public static function update($request) {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'string',
            'avatar' => 'image:jpeg,png,jpg|max:2048',
            'phone' => 'integer|unique:users,phone,'.$user->id,
            'email' => 'required|unique:users,email,'.$user->id,
        ]);

        if ($validator->fails()) {

            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

        // $m_c_code = $request->c_code !='' ? $request->c_code : '+91';

        $user = $request->user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        // $user->phone = $request->phone;

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

	public static function add_address($request) {

        $validator = Validator::make($request->all(), [
            'house_no' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'tag' => 'required|string|max:50',
            'pin' => 'required|integer',
        ]);

        if ($validator->fails()) {

            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

        $address = new Address();
        $address->house_no = $request->house_no;
        $address->area = $request->area;
        $address->landmark = $request->landmark;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->pin = $request->pin;
        $address->tag = $request->tag;
        $address->user_id = $request->user()->id;

        if($address->save()){
            $response_array = ['success' => true, 'data' => $address, 'message' => 'Address added successfully!'];
        } else {
            $response_array = ['success' => false, 'message' => 'Something went wrong!'];
        }
        return $response_array;
	}

	public static function update_address($request) {

        $validator = Validator::make($request->all(), [
            'address_id' => 'required|exists:addresses,id',
            'house_no' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'tag' => 'required|string|max:50',
            'pin' => 'required|integer',
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

        $address = Address::find($request->address_id);
        $address->house_no = $request->house_no;
        $address->area = $request->area;
        $address->landmark = $request->landmark;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->pin = $request->pin;
        $address->tag = $request->tag;
        $address->user_id = $request->user()->id;

        if($address->save()){
            $response_array = ['success' => true, 'data' => $address, 'message' => 'Address updated successfully!'];
        } else {
            $response_array = ['success' => false, 'message' => 'Something went wrong!'];
        }
        return $response_array;
	}

	public static function delete_address($request) {

        $validator = Validator::make($request->all(), [
            'address_id' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

        $address = Address::where([
            ['user_id', $request->user()->id],
            ['id', $request->address_id],
        ])->first();

        if ($address === null) {
            $response_array = ['success' => false, 'message' => 'It seems like address does not exists or not belongs to you.'];
            return $response_array;
        }

        if($address->delete()){
            $response_array = ['success' => true, 'message' => 'Address deleted successfully!'];
        } else {
            $response_array = ['success' => false, 'message' => 'Something went wrong!'];
        }
        return $response_array;
	}

    /*
    *   Get addres by id
    *
    */    
	public static function get_address($request) {

        $validator = Validator::make($request->all(), [
            'address_id' => 'required|exists:addresses,id'
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

        $address = Address::find($request->address_id);
        if($address)
        {
            $response_array = ['success' => true, 'data' => $address, 'message' => 'Phone number verified successfully.'];
        } else {
            $response_array = ['success' => false, 'message' => 'OTP is not valid. Please enter valid OTP'];
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

	public static function change_password($request) {

        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        $user = $request->user();
        if(!$user)
        {
            $response_array = ['success' => false, 'message' => 'Please login to do this action.'];
            return $response_array;
        }

        if(!Hash::check($request->current_password, $user->password))
        {
            $response_array = ['success' => false, 'message' => 'Current Password not matched'];
            return $response_array;
        }
   
        $user->update(['password'=> Hash::make($request->new_password)]);

        if($user->save()){
            $response_array = ['success' => true, 'message' => 'Password successfully changed!'];
        } else {
            $response_array = ['success' => false, 'message' => 'Something went wrong!'];
        }
    	return $response_array;    
    }
}