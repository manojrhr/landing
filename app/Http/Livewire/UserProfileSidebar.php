<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class UserProfileSidebar extends Component
{
    public $user, $balance = null;

    public function render()
    {
        $this->user = Auth::user();
        \Stripe\Stripe::setApiKey(config('stripe.secret'));
        if($this->user->completed_stripe_onboarding){
            $params = ['stripe_account' => $this->user->stripe_connect_id];
            // dd($params);
            $this->balance = \Stripe\Balance::retrieve(
                $params
              )->available[0]->amount;
        }
        return view('livewire.user-profile-sidebar');
    }
}
