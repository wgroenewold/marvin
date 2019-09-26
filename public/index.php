<?php

require_once('marvin.class.php');

$instance = marvin::instance();

$data = $instance->slack->receive();

if($data && is_array($data)){
    $uri = $data['response_url'];
    $user_id = $data['user']['id'];
    $user_avg = $instance->score->get_user_avg($user_id);
    $daily_avg = $instance->score->get_daily_avg();
    $total_avg = $instance->score->get_total_avg();

    $text = getenv('SLACK_CONFIRMATIONTXT');

    $input = array(
        "{NOW}",
        "{USER_AVG}",
        "{USER_COUNT}",
        "{DAILY_AVG}",
        "{DAILY_COUNT}",
        "{TOTAL_AVG}",
        "{TOTAL_COUNT}"
    );
    $output = array(
        $data['actions'][0]['value'],
        $user_avg['avg'],
        $user_avg['count'],
        $daily_avg['avg'],
        $daily_avg['count'],
        $total_avg['avg'],
        $total_avg['count'],
    );

    $text = str_replace($input, $output, $text);

    $confirmation = array(
        'response_type' => 'ephemeral',
        'replace_original' => true,
        'text' => $text,
    );

    $instance->slack->send($uri, $confirmation);
}

