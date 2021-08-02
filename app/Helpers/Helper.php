<?php
use Twilio\Rest\Client;
use App\User;

if (!function_exists('null_safe')) {

    // Convert all NULL values to empty strings
    function null_safe($arr) {
        $newArr = array();
        foreach ($arr as $key => $value) {
            $newArr[$key] = ($value == NULL && $value != 0) ? "" : $value;
        }
        return $newArr;
    }

    function sendsms($phone, $message)
    {
        // $receiverNumber = "+919882270566";
        $receiverNumber = $phone;
        $message = $message;
        // $message = "This is testing from Delivery";
  
        try {
            $account_sid = env('TWILIO_ACCOUNT_SID');
            $auth_token = env('TWILIO_AUTH_TOKEN');
            $twilio_number = env('TWILIO_FROM');
            $client = new Client($account_sid, $auth_token);
            // dump($client);
            $smessage = $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message
            ]);
            // dump($smessage);
            // dump('here');
            // dd($smessage->sid);
  
        } catch (Exception $e) {
            Log::info("Error: ". $e->getMessage());
        }
    }

    function sendOTP($id)
    {
        $user = User::find($id);
        $otp = rand(1111,9999);
        $user->otp = $otp;
        $user->save();
        $message = "Your OTP for ".getenv("APP_NAME")." is ".$otp;
        sendsms($user->c_code.$user->phone, $message);
    }

    function currency_sym(){
        // return '$';
        return 'CA$';
    }

    function admin_charges(){
        return 10;
    }
}
