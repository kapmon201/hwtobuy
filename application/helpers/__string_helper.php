<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_sanitized($string){
    $string = filter_var($string, FILTER_SANITIZE_STRING);
    $string = trim($string);
    $string = stripslashes($string);
    $string = strip_tags($string);

    return $string;
}
