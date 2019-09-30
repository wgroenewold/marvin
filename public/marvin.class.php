<?php

require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create('../');
$dotenv->load();
require_once('app/slack.php');
require_once('app/db.php');
require_once('app/score.php');

setlocale(LC_ALL, 'nl_NL');

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
            self::$instance = new static();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $this->slack = new marvin_slack();
        $this->db = new marvin_db();
        $this->score = new marvin_score();
    }
}