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
        if($data['event']['username'] !== 'Marvin' && $data['event']['message']['username'] !== 'Marvin'){
            $args = array(
                'text' => $data['event']['text'],
                'channel' => $data['event']['channel'],
                'created_at' => date('Y-m-d H:i:s'),
            );

            $instance->db->create('messages', $args);

            $text = explode(',', getenv('SUBSCRIBE_CONFIRMATIONS'));

            $key = array_rand($text);
            $text = $text[$key];
            $text = trim($text);

            $instance->slack->send('https://slack.com/api/chat.postMessage', array(
                'token' => getenv('SLACK_TOKEN'),
                'channel' => $data['event']['channel'],
                'text' => isset($data['event']['username']),
            ));
        }
    }
}