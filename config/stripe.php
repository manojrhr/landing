<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Stripe Publishable Key
    |--------------------------------------------------------------------------
    |
    | The Stripe publishable key is generally used by the client side application
    | meant solely to identify your account with Stripe, they aren't secrete.
    | In other words, they can safely be published in places like your Stripe.js
    | JavaScript code, or in an Android or Iphone app.
    |
    */

    'publishable' => env('STRIPE_PUBLISHABLE', null),

    /*
    |--------------------------------------------------------------------------
    | Stripe Secret Key
    |--------------------------------------------------------------------------
    |
    | The Stripe secret key is keys should be kept confidential and only stored
    | on our servers. They can perform any API request to Stripe without restriction.
    |
    */

    'secret' => env('STRIPE_SECRET', null),

];