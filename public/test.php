<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('marvin.class.php');

$instance = marvin::instance();

//$instance->slack->create_msg('banaan', file_get_contents('../dialog.json'), 'https://slack.com/api/chat.postMessage');


$input = "payload=%7B%22type%22%3A%22block_actions%22%2C%22team%22%3A%7B%22id%22%3A%22T03AC2262%22%2C%22domain%22%3A%22ghocommunicatie%22%7D%2C%22user%22%3A%7B%22id%22%3A%22U03AC2266%22%2C%22username%22%3A%22wouter%22%2C%22name%22%3A%22wouter%22%2C%22team_id%22%3A%22T03AC2262%22%7D%2C%22api_app_id%22%3A%22AKRSMC3FY%22%2C%22token%22%3A%22zyom0qbAl7Bxyg4nZwYKERD0%22%2C%22container%22%3A%7B%22type%22%3A%22message%22%2C%22message_ts%22%3A%221569507807.002500%22%2C%22channel_id%22%3A%22CKHCLEE01%22%2C%22is_ephemeral%22%3Afalse%7D%2C%22trigger_id%22%3A%22767994174977.3352070206.ed2f081927c284868bb24fc3be4aa1ab%22%2C%22channel%22%3A%7B%22id%22%3A%22CKHCLEE01%22%2C%22name%22%3A%22testkanaal%22%7D%2C%22message%22%3A%7B%22type%22%3A%22message%22%2C%22subtype%22%3A%22bot_message%22%2C%22text%22%3A%22banaan%22%2C%22ts%22%3A%221569507807.002500%22%2C%22username%22%3A%22Marvin%22%2C%22bot_id%22%3A%22BKP98BWDS%22%2C%22blocks%22%3A%5B%7B%22type%22%3A%22image%22%2C%22block_id%22%3A%22C3WN%22%2C%22image_url%22%3A%22https%3A%5C%2F%5C%2Fmedia.giphy.com%5C%2Fmedia%5C%2F9AeRnRRNQokeI%5C%2Fgiphy-downsized.gif%22%2C%22alt_text%22%3A%22Freeze%3F+I%27m+a+robot.+I%27m+not+a+refrigerator.%22%2C%22title%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%22Don%27t+panic.%22%2C%22emoji%22%3Atrue%7D%2C%22fallback%22%3A%22250x122px+image%22%2C%22image_width%22%3A250%2C%22image_height%22%3A122%2C%22image_bytes%22%3A425502%2C%22is_animated%22%3Atrue%7D%2C%7B%22type%22%3A%22actions%22%2C%22block_id%22%3A%22wztpz%22%2C%22elements%22%3A%5B%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_1%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%221%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%221%22%7D%2C%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_2%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%222%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%222%22%7D%2C%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_3%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%223%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%223%22%7D%2C%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_4%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%224%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%224%22%7D%2C%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_5%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%225%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%225%22%7D%5D%7D%2C%7B%22type%22%3A%22actions%22%2C%22block_id%22%3A%22yjs%5C%2FF%22%2C%22elements%22%3A%5B%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_6%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%226%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%226%22%7D%2C%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_7%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%227%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%227%22%7D%2C%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_8%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%228%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%228%22%7D%2C%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_9%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%229%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%229%22%7D%2C%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_10%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%2210%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%2210%22%7D%2C%7B%22type%22%3A%22button%22%2C%22action_id%22%3A%22score_11%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%2211%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%2211%22%7D%5D%7D%5D%7D%2C%22response_url%22%3A%22https%3A%5C%2F%5C%2Fhooks.slack.com%5C%2Factions%5C%2FT03AC2262%5C%2F773949968292%5C%2FMNA0GaK67RWQXGJ0BwSqo96Z%22%2C%22actions%22%3A%5B%7B%22action_id%22%3A%22score_7%22%2C%22block_id%22%3A%22yjs%5C%2FF%22%2C%22text%22%3A%7B%22type%22%3A%22plain_text%22%2C%22text%22%3A%227%22%2C%22emoji%22%3Atrue%7D%2C%22value%22%3A%227%22%2C%22type%22%3A%22button%22%2C%22action_ts%22%3A%221569508319.392147%22%7D%5D%7D";





var_dump($input);