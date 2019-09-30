<?php

//use GuzzleHttp\Client;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('marvin.class.php');

$instance = marvin::instance();

$args = array(
    'token' => 'xoxb-3352070206-658409698163-wx6Bd8UKMdUfxlQP6XwvxJDi',
    'exclude_archived' => true,
    'limit' => 1,
    'types' => 'im',
    'cursor' => '',
);

//$test = $instance->slack->get('https://slack.com/api/conversations.list', $args);

$test = $instance->slack->list_channels();
var_dump($test);