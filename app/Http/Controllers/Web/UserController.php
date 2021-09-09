<?php

namespace App\Http\Controllers\Web;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as UserRepo;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:web','VerifiedGuy'], ['except' => ['show_otp_form' ,'verify_otp']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show_profile()
    {
        $user = Auth::user();
        return view('web.user.profile', compact('user'));
    }

    public function edit_profile()
    {
        $user = Auth::user();
        return view('web.user.edit-profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $response_array = UserRepo::update($request);
        if($response_array['success'] === true){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Profile updated successfully!');
            return Redirect::back();
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $response_array['message']);
            return Redirect::back();
        }
        // return view('web.user.profile');
    }

    public function show_otp_form(){
        return view('web.user.otp-form');
    }

    public function verify_otp(Request $request)
    {
        // dd($request->all());
        $response_array = UserRepo::verifyOTP($request);
        if($response_array['success'] === true){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', $response_array['message']);
            return redirect('/user/profile');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $response_array['message']);
            return Redirect::back();
        }
    }
    
    public function bookings(Request $request){
        $bookings = Booking::where('user_id',Auth::user()->id)->get();
        return view('web.user.bookings', compact('bookings'));
    }
    
    public function get_password_form(Request $request){
        return view('web.user.change-password');
    }

    public function change_password(Request $request)
    {
        $response_array = UserRepo::change_password($request);
        if($response_array['success'] === true){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', $response_array['message']);
            return Redirect::back();
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $response_array['message']);
            return Redirect::back();
        }
    }
}
