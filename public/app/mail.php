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
		$message = str_replace(array('{USER}', '{MESSAGE}'), array($args['user_id'], $args['text']), $this->message);
		//@todo reply-to setten op basis van user lookup
		$data = array(
//			'replyto' => '',
			'message' => $message,
			);

		$this->send($data);
	}

	public function send($args){
		$headers = 'From: marvin@services.ghonline.nl' . "\r\n" .
//		           'Reply-To: ' . $args['replyto'] . "\r\n" .
		           'X-Mailer: PHP/' . phpversion();

		mail($this->email, $this->subject, $args['message'], $headers);
	}
}