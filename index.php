<?php

##### MAIN FILE #####

//Include the auxiliary files
require('app/app.php');

//Import data and convert to json string
$json = get_data();

//Decode the json string
$terms = json_decode($json);

//Call main program
view('index', $terms);


