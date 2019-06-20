<?php

require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;

class geluksdubbeltje{
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
}