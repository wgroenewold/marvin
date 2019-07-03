<?php

/**
 * Class db. For communication with DB.
 */

class marvin_db{
    public function __construct(){
        $database = new Medoo([
            // required
            'database_type' => 'mysql',
            'database_name' => 'marvin',
            'server' => 'localhost',
            'username' => 'your_username',
            'password' => 'your_password',

            // [optional]
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'port' => 3306,

            // [optional] Table prefix
            'prefix' => 'PREFIX_',

            // [optional] Enable logging (Logging is disabled by default for better performance)
            'logging' => true,

            // [optional] MySQL socket (shouldn't be used with server and port)
            'socket' => '/tmp/mysql.sock',

            // [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL
            ],

            // [optional] Medoo will execute those commands after connected to the database for initialization
            'command' => [
                'SET SQL_MODE=ANSI_QUOTES'
            ]
        ]);

        $database->insert("account", [
            "user_name" => "foo",
            "email" => "foo@bar.com"
        ]);
    }

    public function create(){

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