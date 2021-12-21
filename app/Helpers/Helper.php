<?php

use App\Blog;
use Twilio\Rest\Client;
use App\User;
use App\Country;
use App\PageComponent;

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
        
        $url="https://api.openweathermap.org/data/2.5/weather?q=Kingston,JM&appid=28f6c380a7c1905b50a97e289869b2fe&units=metric";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);

        $data = (object)json_decode($result, true);
        return $data->main['temp'];
    }

    function get_component($slug)
    {
        $component = PageComponent::where('slug',$slug)->first();
        if(!$component){
            return '';
        }
        return $component->body;
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
