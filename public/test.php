<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('marvin.class.php');

$instance = marvin::instance();



$instance->slack->create_msg('banaan', file_get_contents('../dialog.json'), 'https://slack.com/api/chat.postMessage');