<?php 
return [ 
    'client_id' => env('PAYPAL_CLIENTID'),
	'secret' => env('PAYPAL_SECRET'),
    'settings' => array(
        /**
        * Available option 'sandbox' or 'live'
        */
        'mode' => env('PAYPAL_MODE', 'sandbox'),
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];