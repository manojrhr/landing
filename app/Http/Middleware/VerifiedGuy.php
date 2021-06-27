<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifiedGuy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // // if they have a key...
        if(Auth::user()->delivery_guy)
        {
            if (!Auth::user()->isActivated()) {
                Auth::logout();
                return redirect(route('login'))->withErrors(['email' => "Your Account is not verified by Admin!!!!"]);
            }
        }
        return $next($request);
    }
}
