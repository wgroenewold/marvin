<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;

/**
 * Class slack. For communication with Slack
 */

class marvin_slack{
    private $token;
    private $channel_id;

    public function __construct(){
        $this->token = getenv('SLACK_TOKEN');
        $this->channel_id = getenv('SLACK_CHANNELID');
    }

    public function create_msg($balloon_txt, $blocks, $uri = false){
        $blocks = json_decode($blocks, true);

        $data = array(
            'channel' => $this->channel_id,
            'text' => $balloon_txt,
            'blocks' => $blocks,
        );

        $data = json_encode($data, true);

        if($uri){
            if($data){
                $msg = $this->send($uri, $data);
                return $msg;
            }else{
                $this->log('Kon geen data maken, dus stuk.');
            }
        }else{
            return $data;
        }

        return null;
    }

    public function send($uri, $data){
        //Add extra headers for Slack.
        $instance = new Client(['headers' => array(
            'Content-type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer ' . $this->token,
        )]);

        try{
            $result = $instance->post($uri, ['json' => $data]);
            $body = (string) $result->getBody();
            $body = json_decode($body);

            if(!empty($body)){
                return $body;
            }else{
                return false;
            }
        }
        catch(TransferException $e){
            $this->log($e);
        }

        return null;
    }

    /*
     * Receive POST request
     */
    public function receive(){
        //@todo dit gaat nog niet goed als er geen input is

        $input = file_get_contents('php://input');
        $decode = json_decode($input, true);

        //Validator for Slack
        if(isset($decode) && array_key_exists('challenge', $decode)) {
            var_dump($input);
        }

        if(!empty($decode)){
            $db = new marvin_db();

            $data = array(
                'user_id' => $decode['user']['id'],
                'score' => intval($decode['actions'][0]['value']),
                'created_at' => date('Y-m-d H:i:s'),
            );

            $db->create('results', $data);
            return $decode;
        }else{
            return false;
        }
    }

    public function log($e){
        $file = getenv('LOG_FILE');
        $current = file_get_contents($file);
        $current .= serialize($e) . "\n";
        file_put_contents($file, $current);
    }
}