<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string',
    		'email' => 'required|string|email|unique:users',
            'phone' => ['required', 'numeric', 'min:10'],
    		'password' => 'required|string|confirmed'
    	]);

    	$user = new User([
    		'name' => $request->name,
    		'email' => $request->email,
            'phone' => $request->phone,
    		'password' => bcrypt($request->password)
    	]);

    	$user->save();

    	return response()->json([
    		'success' => true,
    		'message' => 'Successfully created user!'
    	], 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
    	$request->validate([
    		'email' => 'required|string|email',
    		'password' => 'required|string',
    		'remember_me' => 'boolean'
    	]);

    	$credentials = request(['email', 'password']);
    	if(!Auth::attempt($credentials))
    		return response()->json([
	    		'success' => false,
    			'message' => 'Username or Password is wrong.'
    		], 401);
    	$user = $request->user();

    	$tokenResult = $user->createToken('Personal Access Token');
    	$token = $tokenResult->token;

    	if ($request->remember_me)
    		$token->expires_at = Carbon::now()->addWeeks(1);
    	$token->save();

    	return response()->json([
    		'success' => true,
    		'access_token' => $tokenResult->accessToken,
    		'token_type' => 'Bearer',
    		'expires_at' => Carbon::parse(
    			$tokenResult->token->expires_at
    		)->toDateTimeString()
    	]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
    	$request->user()->token()->revoke();
    	return response()->json([
    		'success' => true,
    		'message' => 'Successfully logged out'
    	]);
    }

    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email|exists:users']);

        Password::sendResetLink($credentials);

        return response()->json([
            "success" => true,
            "message" => "Reset password link sent on your email id."
        ]);
    }
}
