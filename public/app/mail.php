<?php

/**
 * Class slack. For communication with Slack
 */

class marvin_mail{
	public function __construct(){
		$this->mail = new marvin_mail();
		$this->email = getenv('MAIL_ADDRESS');
		$this->subject = getenv('MAIL_SUBJECT');
	}

	public function create($args){
//		$args = array(
//			'user_id' => $data['event']['user'],
//			'text' => $data['event']['text'],
//			'channel' => $data['event']['channel'],
//			'created_at' => date('Y-m-d H:i:s'),
//		);

		$data = array(
			'replyto' => '',
			'message' => ''
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