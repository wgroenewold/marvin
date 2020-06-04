<?php

/**
 * Class slack. For communication with Slack
 */

class marvin_mail{
	public function __construct(){
		$this->mail = new marvin_mail();
		$this->email = getenv('MAIL_ADDRESS');
		$this->subject = getenv('MAIL_SUBJECT');
		$this->message = getenv('MAIL_MESSAGE');
	}

	public function create($args){
		$instance = marvin::instance();
		$user = $instance->db->read('users', ['name', 'email'], ['user_id' => $args['user_id']]);

		$msg = $args['text'];
		$filter_msg = preg_match('/<@(.*)>/', $msg, $match_array);

		if($filter_msg){
			foreach($match_array as $item){
				$user_id = $item[1];
				$text_user = $instance->db->read('users', ['name'], ['user_id' => $user_id]);
				$msg = str_replace($item[0], $text_user['name'], $msg);
			}
		}

		$message = str_replace(array('{USER}', '{MESSAGE}'), array($user['name'], $msg), $this->message);

		$data = array(
			'replyto' => $user['email'],
			'message' => $message,
			);

		$this->send($data);
	}

	public function send($args){
		$headers = 'From: marvin@services.ghonline.nl' . "\r\n" .
		           'Reply-To: ' . $args['replyto'] . "\r\n" .
		           'X-Mailer: PHP/' . phpversion();

		mail($this->email, $this->subject, $args['message'], $headers);
	}
}