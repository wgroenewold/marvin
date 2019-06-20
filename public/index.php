<?php

//Validator for challenge.
$postdata = file_get_contents('php://input');
$decode = json_decode($postdata, true);
if(array_key_exists('challenge', $decode)){
    var_dump($postdata);
}

