<?php

require_once('marvin.class.php');

$instance = marvin::instance();

$data = $instance->slack->receive();
if($data && is_array($data)){
    $uri = $data['response_url'];

    $confirmation = array(
        'response_type' => 'ephemeral',
        'replace_original' => true,
        'text' => getenv('SLACK_CONFIRMATIONTXT'),
    );

    $confirmation = json_encode($confirmation, true);
    $instance->slack->send($uri, $confirmation);
}