<?php
require_once('marvin.class.php');

$instance = marvin::instance();

$users = $instance->slack->list_users();

foreach($users as $value){
	$instance->db->create('users', $value);
}

echo 'Users saved.';