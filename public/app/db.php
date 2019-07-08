<?php

use Medoo\Medoo;

/**
 * Class db. For communication with DB.
 */

class marvin_db{
    private $connection;
    private $db_type;
    private $db_name;
    private $db_server;
    private $db_user;
    private $db_pass;
    private $db_charset;
    private $db_collation;
    private $db_port;


    public function __construct(){
        $this->db_type = getenv('DB_TYPE');
        $this->db_name = getenv('DB_NAME');
        $this->db_server = getenv('DB_SERVER');
        $this->db_user = getenv('DB_USER');
        $this->db_pass = getenv('DB_PASS');
        $this->db_charset = getenv('DB_CHARSET');
        $this->db_collation = getenv('DB_COLLATION');
        $this->db_port = getenv('DB_PORT');

        $this->connection = new Medoo([
            // required
            'database_type' => $this->db_type,
            'database_name' => $this->db_name,
            'server' => $this->db_server,
            'username' => $this->db_user,
            'password' => $this->db_pass,
            'charset' => $this->db_charset,
            'collation' => $this->db_collation,
            'port' => $this->db_port,
            'logging' => true,
        ]);
    }

    /*
     * Insert into DB. Data is assoc array with key as column.
     */

    public function create($table, $data){
        $this->connection->insert($table, $data);

        return $this->connection->id();
    }

    public function read($table, $columns, $where = null){
        $data = $this->connection->select($table, $columns, $where);
        return $data;
    }

    public function update($table, $data, $where = null){
        $this->connection->update($table, $data, $where);
    }

    public function delete($table, $where){
        $this->connection->delete($table, $where);
    }
}