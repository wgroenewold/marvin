<?php

require_once('marvin.class.php');

$instance = marvin::instance();

$balloon_txt = getenv('SLACK_BALLOONTXT');
$blocks = file_get_contents('../dialog.json');

$channels = $instance->slack->list_channels();

foreach($channels as $channel){
    $instance->slack->create_msg($balloon_txt, $blocks, $channel, 'https://slack.com/api/chat.postMessage');
}