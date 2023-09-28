<?php
//Important Hello
// echo "hello";

if(!function_exists('p')) {
    function p($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        // dd($data);
    }
}

if(!function_exists('get_formatted_data')){
    function get_formatted_data($date, $format)
    {
        $formattedDate = date($format,strtotime($date));
        return $formattedDate;
    }
}