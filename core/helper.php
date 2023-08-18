<?php

require_once "Config.php";

$base_path = Config::BASE_PATH->value;
if(!function_exists('dd')){
    function dd($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die();
    }
}

//redirect function
if(!function_exists('redirect')){
    function redirect($location){
        global $base_path;
        $location = $base_path.$location;
        header("Location: $location");
    }
}
