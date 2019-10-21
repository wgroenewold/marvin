<?php

use Medoo\Medoo;

/**
 * Class db. For communication with DB.
 */

class marvin_db{
    private $con;


    public function __construct(){
<<<<<<< HEAD
        $this->db_type = getenv('DB_TYPE');
        $this->db_name = getenv('DB_NAME');
        $this->db_server = getenv('DB_SERVER');
        $this->db_user = getenv('DB_USER');
        $this->db_pass = getenv('DB_PASS');
        $this->db_charset = getenv('DB_CHARSET');
        $this->db_collation = getenv('DB_COLLATION');
        $this->db_port = getenv('DB_PORT');

        $this->connection = new Medoo([
            'database_type' => $this->db_type,
            'database_name' => $this->db_name,
            'server' => $this->db_server,
            'username' => $this->db_user,
            'password' => $this->db_pass,
            'charset' => $this->db_charset,
            'collation' => $this->db_collation,
            'port' => $this->db_port,
=======
        $this->con = new Medoo([
            // required
            'database_type' => 'mysql',
            'database_name' => 'marvin',
            'server' => 'localhost',
            'username' => 'marvin',
            'password' => 'QR1iUWA6XhLrb8_8b1Y0265IDOit',

            // [optional]
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'port' => 3306,

            // [optional] Table prefix

            // [optional] Enable logging (Logging is disabled by default for better performance)
>>>>>>> parent of 6cdf8d5... Extended Slack and DB options
            'logging' => true,

            // [optional] MySQL socket (shouldn't be used with server and port)
//            'socket' => '/tmp/mysql.sock',

            // [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
//            'option' => [
//                PDO::ATTR_CASE => PDO::CASE_NATURAL
//            ],

            // [optional] Medoo will execute those commands after connected to the database for initialization
//            'command' => [
//                'SET SQL_MODE=ANSI_QUOTES'
//            ]
        ]);
    }

    public function create(){
        $this->con->insert("results", [
            "user_id" => "foo",
            "score" => "10",
            "created_at" => date("Y-m-d H:i:s"),
        ]);

        return $this->con->id();
    }

    public function read(){

    }

    public function update(){
        //not needed yet
    }

    public function delete(){
        //not needed yet
    }

    public function avg($table, $column, $where = null){
        $data = $this->connection->avg($table, $column, $where);
        return $data;
    }
}