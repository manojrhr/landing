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
        Log::info("Phone No. ".$phone);
        // $receiverNumber = "+919882270566";
        $receiverNumber = $phone;
        $message = $message;
        // $message = "This is testing from Delivery";
  
        try {
            $account_sid = Config::get("app.twilio.TWILIO_AUTH_TOKEN");
            $auth_token = Config::get("app.twilio.TWILIO_SID");
            $twilio_number = Config::get("app.twilio.TWILIO_FROM");
            Log::info("Twilio credentials dump ". $twilio_number);
            
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message
            ]);
  
            // dd('SMS Sent Successfully.');
  
        } catch (Exception $e) {
            Log::info("Error: ". $e->getMessage());
        }
    }

    function sendOTP($id)
    {
        $user = User::find($id);
        $otp = rand(111111,999999);
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
