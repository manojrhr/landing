<?php

use App\Blog;
use Twilio\Rest\Client;
use App\User;
use App\Country;

if (!function_exists('null_safe')) {

    // Convert all NULL values to empty strings
    function null_safe($arr) {
        $newArr = array();
        foreach ($arr as $key => $value) {
            $newArr[$key] = ($value == NULL && $value != 0) ? "" : $value;
        }
        return $newArr;
    }
    
    function get_latest_temp()
    {
        
        $url="https://api.openweathermap.org/data/2.5/onecall?lat=18.1096&lon=77.2975&exclude=minutely,hourly.daily,alerts&appid=28f6c380a7c1905b50a97e289869b2fe&units=metric";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);

        $data = (object)json_decode($result, true);
        return $data->current['temp'];
    }

    function get_latest_blog_post()
    {
        return $last_post = Blog::orderBy('id', 'desc')->first();
    }

    function currency_sym(){
        // return '$';
        return 'CA$';
    }

    function admin_charges(){
        return 10;
    }

    function get_countries_list(){
        return Country::all();
    }
}
