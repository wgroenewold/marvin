<?php

require_once('marvin.class.php');

$instance = marvin::instance();

$data = $instance->slack->receive();

if($data && is_array($data)){
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

	$blocks = $instance->tags->create_dialog(file_get_contents('../tags.json'));

	$results = str_replace('{RESULTS}', $text, $blocks);

    switch($data['actions'][0]['block_id']) {
        case 'score_1':
        case 'score_2':
            $args = array(
                'channel' => $data['container']['channel_id'],
                'text' => $text,
                'ts' => $data['container']['message_ts'],
                'blocks' => $results,
            );

            break;
        case 'tags_1':
        case 'tags_2':
			$tag_blocks = array(
				array(
					'type' => 'section',
					'text' => array(
						'type' => 'plain_text',
						'text' => getenv('TAGS_CONFIRMATIONTXT'),
						'emoji' => true,
					)
				),
				array(
					'type' => 'divider',
				),
				array(
					'type' => 'section',
					'text' => array(
						'type' => 'plain_text',
						'text' => $text,
						'emoji' => true,
					)
				),
			);


            $args = array(
                'channel' => $data['container']['channel_id'],
                'text' => $text,
                'ts' => $data['container']['message_ts'],
                'blocks' => json_encode($tag_blocks),
            );

            break;
    }

    $instance->slack->send('https://slack.com/api/chat.update', $args);

    //remove expiration from db
    $instance->db->delete("expiration", ["ts" => $data['container']['message_ts']]);
}