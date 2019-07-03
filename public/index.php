<?php

require_once('marvin.class.php');

$instance = marvin::instance();
$test = $instance->db->create();

var_dump($test);