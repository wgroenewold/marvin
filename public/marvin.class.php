<?php

require '../vendor/autoload.php';
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
        $this->slack = new marvin_slack();
        $this->db = new marvin_db();
    }
}