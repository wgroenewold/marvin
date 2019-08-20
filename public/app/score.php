<?php

/**
 * Class results. To calculate results.
 */

class marvin_score{
    private $db;

    public function __construct(){
        //$this->db = new marvin_db();

        $this->db = marvin::instance()->db; //@todo volgens mij moet het zoiets worden
    }

    public function get_user_avg($user_id){
        $where = array('user_id' => $user_id);

        $count = count($this->db->read('results', 'score', $where));
        $avg = $this->db->avg('results', 'score', $where);

        return array(
            'count' => $count,
            'avg' => $avg,
        );
    }

    /*
     * if $date === false, return results of today
     */
    public function get_daily_avg($date = false){
        if($date === false){
            //today
            $range = array(
                date("Y-m-d H:i:s", mktime(0, 0, 0)),
                date("Y-m-d H:i:s", mktime(23, 59, 59)),
            );
        }else{
             $range = array(
                date("Y-m-d H:i:s", mktime(date('d', $date), date('m', $date), date('Y', $date), 0, 0, 0)),
                date("Y-m-d H:i:s", mktime(date('d', $date), date('m', $date), date('Y', $date), 23, 59, 59)),
            );
        }

        $where = array("created_at[<>]" => $range);

        $count = count($this->db->read('results', 'score', $where));
        $avg = $this->db->avg('results', 'score', $where);

        return array(
            'count' => $count,
            'avg' => $avg,
        );
    }

    public function get_total_avg(){
        $count = count($this->db->read('results', 'score'));
        $avg = $this->db->avg('results', 'score');

        return array(
            'count' => $count,
            'avg' => $avg,
        );
    }
}