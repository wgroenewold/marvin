<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('marvin.class.php');

$instance = marvin::instance();

$balloon_txt = 'checkiecheck';
$blocks = file_get_contents('../dialog.json');
$blocks = $instance->slack->template($blocks);
$channel = 'DKPEU8UCU';
$uri = 'https://slack.com/api/chat.postMessage';

//send initial message (1-11)
$response = $instance->slack->create_msg($balloon_txt, $blocks, $channel, $uri);

//chat.update all old ones as expired
$expired = $instance->db->read('expiration', ['ts', 'channel'], ["created_at[<]" => date("Y-m-d")]);

foreach($expired as $value){
    $args = array(
        'channel' => $value['channel'],
        'text' => getenv('SLACK_EXPIREDTXT'),
        'ts' => $value['ts'],
        'blocks' => [],
    );


    $instance->slack->send('https://slack.com/api/chat.update', $args);
}

//delete all entries
$instance->db->delete("expiration", ["created_at[<]" => date("Y-m-d")]);

//make new entry
$instance->db->create('expiration', array(
    'ts' => $response['ts'],
    'channel' => $response['channel'],
    'created_at' => date('Y-m-d'),
));