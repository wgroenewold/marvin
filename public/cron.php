<?php

require_once('marvin.class.php');

$instance = marvin::instance();

$balloon_txt = 'Checkiecheck, hoe is je werkgeluk?';
$blocks = file_get_contents('dialog.json');

$instance->slack->create_msg($balloon_txt, $blocks, 'https://slack.com/api/chat.postMessage');