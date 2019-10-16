<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;

/**
 * Class slack. For communication with Slack
 */

class marvin_slack{
    private $token;
    private $db;

    public function __construct(){
        $this->db = new marvin_db();
        $this->token = getenv('SLACK_TOKEN');
    }

    public function template($data){
        $input = array(
            "{TODAY}",
        );

        $output = array(
            strftime("%A %e %B %Y", time()),
        );

        $data = str_replace($input, $output, $data);

        return $data;
    }


    public function list_channels(){
        $data = array();

        $args = array(
            'token' => $this->token,
            'exclude_archived' => true,
            'limit' => 1000,
            'types' => 'im',
            'cursor' => '',
        );

        $response = $this->get('https://slack.com/api/conversations.list', $args);

        if($response && $response['ok'] == true){
            foreach($response['channels'] as $value){
                $data[] = $value['id'];
            }

            unset($value);

            while(array_key_exists('response_metadata', $response) && $response['response_metadata']['next_cursor'] != false){
                $args['cursor'] = $response['response_metadata']['next_cursor'];

                $response = $this->get('https://slack.com/api/conversations.list', $args);

                if($response && $response['ok'] == true){
                    foreach($response['channels'] as $value){
                        $data[] = $value['id'];
                    }

                    unset($value);

                    $args['cursor'] = $response['response_metadata']['next_cursor'];
                }
            }
        }

        return $data;
    }

    public function create_msg($balloon_txt, $blocks, $channel, $uri = false){
        $blocks = json_decode($blocks, true);

        $data = array(
            'channel' => $channel,
            'text' => $balloon_txt,
            'blocks' => $blocks,
        );

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

    public function get($uri, $data){
        $instance = new Client();

        try{
            $result = $instance->get($uri, ['query' => $data]);
            $body = (string) $result->getBody();
            $body = json_decode($body, true);

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

    public function send($uri, $data){
        //Add extra headers for Slack.
        $instance = new Client(['headers' => array(
            'Content-type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer ' . $this->token,
        )]);

        try{
            $result = $instance->post($uri, ['json' => $data]);
            $body = (string) $result->getBody();
            $body = json_decode($body, true);

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
        $input = file_get_contents('php://input');
        if($input){
            if(strpos($input, 'payload') !== false){
                $input = urldecode($input);
                $input = substr($input,8);
                $decode = json_decode($input, true);

                if(!empty($decode)){
                    //hier splitsen

                    switch($decode['actions'][0]['block_id']){
                        case 'score_1':
                        case 'score_2':
                            $table = 'results';
                            $data = array(
                                        array(
                                            'user_id' => $decode['user']['id'],
                                            'score' => intval($decode['actions'][0]['value']),
                                            'created_at' => date('Y-m-d H:i:s'),
                                        )
                                    );
                            break;
                        case 'tags_1':
                            //emotions
                            $data = array();
                            foreach($decode['actions']['selected_options'] as $tag){
                                $id = explode('_', $tag['value']);
                                $id = $id[1];
                                $data[] = array(
                                    'user_id' => $decode['user']['id'],
                                    'tag_id' => $id,
                                    'created_at' => date('Y-m-d H:i:s'),
                                );
                            }
                            break;
                        case 'tags_2':
                            //decline
                            $table = 'emotions';
                            $data = array(array(
                                'user_id' => $decode['user']['id'],
                                'tag_id' => 0,
                                'created_at' => date('Y-m-d H:i:s'),
                            ));
                            break;
                        default:
                            return false;
                    }

                    foreach($data as $item){
                        $this->db->create($table, $item);
                    }

                    return $decode;
                }else{
                    return false;
                }
            }else{
                //"Validator" for Slack
                $decode = json_decode($input, true);
                if(isset($decode) && array_key_exists('challenge', $decode)) {
                    var_dump($input);
                }
            }
        }
        return null;
    }

    public function log($e){
        $file = getenv('LOG_FILE');
        $current = file_get_contents($file);
        $current .= serialize($e) . "\n";
        file_put_contents($file, $current);
    }
}