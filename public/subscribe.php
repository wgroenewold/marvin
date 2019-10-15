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
        if(isset($data['event']['username']) == false && (isset($data['event']['message']['username']) && $data['event']['username'] != 'marvin')){
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
                'text' => $text,
            ));
        }
    }
    return null;
}

//filter is nog niet helemaal fris

//event.message.username != 'Marvin' event.username != Marvin