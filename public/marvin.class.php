<?php

require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;
use Medoo\Medoo;

require_once('app/setup.php');
require_once('app/slack.php');
require_once('app/db.php');

marvin::instance();
/**
 * Class marvin
 */
class marvin
{
    /**
     * Singleton holder
     */
    private static $instance;

    /**
     * Get the singleton
     *
     * @return marvin
     */
    public static function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Initialize hooks and filters
     */
    private function __construct()
    {
        $this->setup = new marvin_setup();
        $this->slack = new marvin_slack();
        $this->db = new marvin_db();
    }
}