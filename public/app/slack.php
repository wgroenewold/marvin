<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;

/**
 * Class slack. For communication with Slack
 */

class marvin_slack{
    private $token;

    public function __construct(){
        $this->token = 'xoxp-3352070206-3352070210-658386386467-17c46512694e2c67c9222b3fad5c20b0';
    }

    public function send($uri, $data){
        $instance = new GuzzleHttp\Client(['headers' => array(
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
            $file = 'log.txt';
            $current = file_get_contents($file);
            $current .= serialize($e) . "\n";
            file_put_contents($file, $current);
        }

        return null;
    }

    /*
     * Receive POST request
     */
    public function receive(){
        $postdata = file_get_contents('php://input');
        $body = json_decode($body);

        if(!empty($body)){
            return $body;
        }else{
            return false;
        }
    }
}


