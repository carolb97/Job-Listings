<?php

// ######### File used to define all the FUNCTIONS used to simplify the code ##########

//Function that includes "the views" into our base file "index.php"
function view($name,$model) {
    require("views/layout.view.php");
}

// Function to read the json file
function get_data() {
    $fname = CONFIG['data_file'];

    $json = '';

    if (!file_exists($fname)) {
        file_put_contents($fname,'');
    } else {
        $json = file_get_contents($fname);
    }

    return $json;
}

// Function that defines the variables of the json file
function read_entry($model,$index) {

    $item=$model[$index];

    $company = $item->company;
    $position = $item->position;
    $role = $item->role;
    $logo = $item->logo;
    //$logo = '../'.$logo;
    $new = $item->new;
    $featured = $item->featured;
    $level = $item->level;
    $postedAt = $item->postedAt;
    $contract = $item->contract;
    $location = $item->location;
    $languages = $item->languages;
    $tools = $item->tools;

    return [$company,$position,$role,$logo,$new,$featured,
            $level,$postedAt,$contract,$location,$languages,$tools];
}

// Function that takes an array of strings and returns an array with only lowercase strings
function to_lowercase($array){
     
    $result = $array;
    $i = 0;
    foreach($array as $string){
        $result[$i] = strtolower($string);
        $i++;
    }

    return $result;

}




