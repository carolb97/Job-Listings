<?php

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

function to_lowercase($array){
     
    $result = $array;
    $i = 0;
    foreach($array as $string){
        $result[$i] = strtolower($string);
        $i++;
    }

    return $result;

}

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

    return [$company,$position,$role,$logo,$new,$featured,$level,$postedAt,$contract,$location,$languages,$tools];
}
/* //USING FOPEN
function get_data() {
    $fname = CONFIG['data_file'];

    $json = '';

    if (!file_exists($fname)) {
        $handle = fopen($fname,'w+');
        fclose($handle);
    } else {
        $handle = fopen($fname,'r');
        $json = fread($handle, filesize($fname));
        fclose($handle);
    }

    return json;
}*/

function view($name,$model) {
    global $view_bag;
    require("views/layout.view.php");
}

// why is $name defined
/*unction view($model) {
    global $view_bag;
    require("views/layout.view.php");
}*/

