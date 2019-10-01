<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('marvin.class.php');

$instance = marvin::instance();
//
//$balloon_txt = 'checkiecheck';
//$blocks = file_get_contents('../dialog.json');
//$blocks = $instance->slack->template($blocks);
//$channel = 'DKPEU8UCU';
//$uri = 'https://slack.com/api/chat.postMessage';
//
////$instance->slack->create_msg($balloon_txt, $blocks, $channel, 'https://slack.com/api/chat.postMessage');
//
//$args = array(
//    'channel' => 'DKPEU8UCU',
//    'text' => 'Resultaten!',
//    'ts' => '1569936760.005700',
////    'blocks' => file_get_contents('../tags.json'),
//    'blocks' =>
//);
//
//
//$instance->slack->send('https://slack.com/api/chat.update', $args);

$temp = $instance->tags->create_dialog(file_get_contents('../tags.json'));

//read db, make array ready for insert
//
echo '<pre>';
var_dump($temp);
echo '</pre>';