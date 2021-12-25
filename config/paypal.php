<?php 
return [ 
    'client_id' => 'AWVn_Qkhp5zu1GGLLfo2XSc9sdE6K_8EZNFj5fM3Z3bfbsv9_FkWRAppl5H9EkYUljmJJC5P3vqbP_LZ',
	'secret' => 'EEA_XcATrktKY5ohKh3tBe0mkimWfpeAyAxPX8BUHogc0iDW8nGJO5HNqS9l89MuVfyfwQXrichiJJDL',
    'settings' => array(
        /**
        * Available option 'sandbox' or 'live'
        */
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];