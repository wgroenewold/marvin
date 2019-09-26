<?php

require_once('marvin.class.php');

$instance = marvin::instance();

$data = $instance->slack->receive();

//var_dump(getenv('SLACK_CONFIRMATIONTXT'));

if($data && is_array($data)){
    $uri = $data['response_url'];

    $confirmation = array(
        'response_type' => 'ephemeral',
        'replace_original' => true,
        'text' => getenv('SLACK_CONFIRMATIONTXT'),
    );

    $instance->slack->send($uri, $confirmation);
}

