<?php

namespace App\Repositories;
use App\Repositories\CommonRepository as CommonRepo;
use App\User;
use Log;

class UserRepository {

	public static function update($request , $user_id) {

        if($request->id) {
            $user_id = $request->id;
        }

		$user = User::find($user_id);

        $response = [];

        if($user) {

            $first_name = $request->has('first_name') ? $request->first_name : $user->first_name;

            $last_name = $request->has('last_name') ? $request->last_name : $user->last_name;

            if($request->has('name')) {
                $user->name = $request->name;
            } else {
                $user->name = $first_name." ".$last_name;
            }

            if($request->has('mobile')) {
                $user->mobile = $request->mobile;
            }


            // Upload picture
            if ($request->hasFile('picture')) {
                Helper::delete_avatar('uploads/users',$user->picture); // Delete the old pic
                $user->picture = Helper::upload_avatar('uploads/users',$request->file('picture'));
            }

            $user->login_by = $request->login_by ?  $request->login_by : $user->login_by;
            $user->save();

            $response = $user->userResponse($user->id)->first()->toArray();
        }

        return $response;

	}

}