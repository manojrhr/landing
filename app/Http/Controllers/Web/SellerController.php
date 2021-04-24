<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\StripeClient;
use Str;
use Auth;
use App\User;

class SellerController extends Controller
{
	protected $stripeClient;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StripeClient $stripeClient)
    {
        $this->middleware('auth:web');
    	$this->stripeClient = $stripeClient;
    }

    public function redirectToStripe($id)
    {
    	$seller = User::findOrFail($id);

    	if(!$seller->completed_stripe_onboarding){
    		$token = Str::random();
    		DB::table('stripe_state_tokens')->insert([
			    'seller_id' => $seller->id,
			    'token' => $token,
			    'created_at' => now(),
			    'updated_at' => now()
			]);

			if(is_null($seller->stripe_connect_id)){
				// Create account
				$account = $this->stripeClient->accounts->create([
					'country' => 'US',
					'type' => 'express',
					'email' => $seller->email
				]);

				$seller->update(['stripe_connect_id' => $account->id]);
				$seller->fresh();
			}

			$onboardingLink = $this->stripeClient->accountLinks->create([
				'account' => $seller->stripe_connect_id,
				'refresh_url' => route('user.redirect_stripe', ['id' => $seller->id]), 
				'return_url' => route('user.save_stripe', ['token' => $token]), 
				'type' => 'account_onboarding', 
			]);
			return redirect($onboardingLink->url);
    	}

    	$loginLink = $this->stripeClient->accounts->createLoginLink($seller->stripe_connect_id);
    	return redirect($loginLink->url);
    }

    public function saveStripeAccount($token){
    	$stripToken = DB::table('stripe_state_tokens')
    		->where('token', '=', $token)
    		->first();

    	if(is_null($stripToken)){
    		abort(404);
    	}

    	$seller = User::find($stripToken->seller_id);

    	$seller->update([
    		'completed_stripe_onboarding' => true
    	]);
    	$seller->fresh();

    	return redirect()->route('user.profile');
	}
	
	public function jetskis()
	{
		$user = Auth::user();
		$jetskis = Auth::user()->jetskis;
		return view('web.user.seller_jetski', compact('user', 'jetskis'));
	}
}
