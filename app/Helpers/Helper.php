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
