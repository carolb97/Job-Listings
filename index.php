<?php

require('app/app.php');

$json = get_data();

$terms = json_decode($json);

view('index', $terms);


