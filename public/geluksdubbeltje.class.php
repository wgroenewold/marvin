<?php

require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;
use Medoo\Medoo;

class geluksdubbeltje{
    /*
     * Send a POST request
     */
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
        if(isset($_POST) && !empty($_POST)){
            $body = $_POST;
            $body = json_decode($body);

            if(!empty($body)){
                return $body;
            }else{
                return false;
            }
        }
    }

    /*
     * Write to DB
     */
    public function write(){

    }

    /*
     * Get from DB
     */
    public function get(){

    }
}

