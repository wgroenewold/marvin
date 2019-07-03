<?php

/**
 * Class setup. For multiple setup thingies.
 */

class marvin_setup{
    public function __construct(){
        $this->validate();
    }

    //Validate Slack URL challenge
    public function validate(){
        $postdata = file_get_contents('php://input');
        $decode = json_decode($postdata, true);
        if(array_key_exists('challenge', $decode)) {
            var_dump($postdata);
        }
    }
}