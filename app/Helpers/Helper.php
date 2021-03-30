<?php

if (!function_exists('null_safe')) {

    // Convert all NULL values to empty strings
    function null_safe($arr) {
        $newArr = array();
        foreach ($arr as $key => $value) {
            $newArr[$key] = ($value == NULL && $value != 0) ? "" : $value;
        }
        return $newArr;
    }
}
