<?php

/**
 * Class db. For communication with DB.
 */

class marvin_db{
    private $con;


    public function __construct(){
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
}