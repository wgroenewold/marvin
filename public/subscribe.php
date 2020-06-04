<?php

require_once('marvin.class.php');

$instance = marvin::instance();

$input = file_get_contents('php://input');
if($input){
    //"Validator" for Slack
    $data = json_decode($input, true);
    if(isset($data) && array_key_exists('challenge', $data)) {
        var_dump($input);
    }else{
        //filter bot messages
        	switch($data['event']['type']){
		        case 'user_change':
					$user = $data['event']['user'];

		        	$args = array(
						'user_id' => $user['id'],
				        'name' => $user['profile']['real_name'],
				        'email' => $user['profile']['email'],
			        );

		        	$where = ["user_id" => 200];

			        $instance->db->update('messages', $args, $where);

			        break;
		        case 'message':
			        if($data['event']['username'] !== 'Marvin' && $data['event']['message']['username'] !== 'Marvin') {

				        $args = array(
					        'user_id'    => $data['event']['user'],
					        'text'       => $data['event']['text'],
					        'channel'    => $data['event']['channel'],
					        'created_at' => date( 'Y-m-d H:i:s' ),
				        );

				        $instance->db->create( 'messages', $args );
				        $instance->mail->create( $args );


				        $text = explode( ',', getenv( 'SUBSCRIBE_CONFIRMATIONS' ) );

				        $key  = array_rand( $text );
				        $text = $text[ $key ];
				        $text = trim( $text );

				        $instance->slack->send( 'https://slack.com/api/chat.postMessage', array(
					        'token'   => getenv( 'SLACK_TOKEN' ),
					        'channel' => $data['event']['channel'],
					        'text'    => $text,
				        ) );
			        }
			        break;
		        default:
	        }
        }
}