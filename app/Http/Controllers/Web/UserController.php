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
        $this->middleware(['auth:web','verified']);
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
        $balance = null;
        \Stripe\Stripe::setApiKey(config('stripe.secret'));
        if($user->completed_stripe_onboarding){
            $params = ['stripe_account' => $user->stripe_connect_id];
            // dd($params);
            $balance = \Stripe\Balance::retrieve(
                $params
              )->available[0]->amount;
        }
        // dd($balance);
        return view('web.user.profile', compact('user','balance'));
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
}
