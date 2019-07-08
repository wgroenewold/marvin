<?php

require_once('marvin.class.php');

$instance = marvin::instance();

//first
$data = $instance->slack->receive();
if($data && is_array($data)){
    $uri = $data['response_url'];

    $confirmation = array(
        'response_type' => 'ephemeral',
        'replace_original' => true,
        'text' => 'Bedankt voor de bloemen, u hoort van ons!',
    );

    $confirmation = json_encode($confirmation, true);
    $instance->slack->send($uri, $confirmation);
}