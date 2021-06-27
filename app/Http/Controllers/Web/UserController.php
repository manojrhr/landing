<?php

namespace App\Http\Controllers\Web;

use Stripe\StripeClient;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as UserRepo;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class UserController extends Controller
{
	protected $stripeClient;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StripeClient $stripeClient)
    {
        $this->middleware(['auth:web','VerifiedGuy'], ['except' => ['show_otp_form' ,'verify_otp']]);
    	$this->stripeClient = $stripeClient;
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
        return view('web.user.edit-profile');
    }

    public function update_profile(Request $request)
    {
        $response_array = UserRepo::update($request);
        if($response_array['success'] === true){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Profile updated successfully!');
            return redirect('/user/profile');
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
    
}
