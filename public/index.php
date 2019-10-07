<?php

require_once('marvin.class.php');

$instance = marvin::instance();

$data = $instance->slack->receive();

if($data && is_array($data)){
    switch($data['message']['text']) {
        case getenv('SLACK_BALLOONTXT'):
            $user_avg = $instance->score->get_user_avg($data['user']['id']);
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
                "{TOTAL_COUNT}",
                ". ",
                "{TODAY}",
            );
            $output = array(
                $data['actions'][0]['value'],
                $user_avg['avg'],
                $user_avg['count'],
                $daily_avg['avg'],
                $daily_avg['count'],
                $total_avg['avg'],
                $total_avg['count'],
                ". \n",
                strftime("%A %e %B %Y", time()),
            );

            $text = str_replace($input, $output, $text);
            $blocks = file_get_contents('../tags.json');
            $results = str_replace('{RESULTS}', $text, $blocks);

            $args = array(
                'channel' => $data['container']['channel_id'],
                'text' => $text,
                'ts' => $data['container']['message_ts'],
                'blocks' => $results,
            );

            break;
        case getenv('TAGS_BALLOONTXT'):
            $args = array(
                'channel' => $data['container']['channel_id'],
                'text' => getenv('TAGS_CONFIRMATIONTXT'),
                'ts' => $data['container']['message_ts'],
                'blocks' => [],
            );

            break;
    }

    $instance->slack->send('https://slack.com/api/chat.update', $args);

    //remove expiration from db
    $instance->db->delete("expiration", ["ts" => $data['container']['message_ts']]);
}