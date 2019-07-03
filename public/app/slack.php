<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;

/**
 * Class slack. For communication with Slack
 */

class marvin_slack{
    public function __construct(){
    }

    public function send($uri, $data){
        $instance = new GuzzleHttp\Client();

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
            //@todo log an error, so make a logging thing.
            echo 'stuk';
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