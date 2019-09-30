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

$return = $instance->slack->create_msg($balloon_txt, $blocks, $channel, $uri);





/*echo '<pre>';
var_dump($return);
echo '</pre>';*/

//var_dump(date("l j F Y"));

//datetime uit return halen
//if datetime + 24, dan expire triggeren die bericht overschrijft





//echo strftime("%A %e %B %Y", time());
