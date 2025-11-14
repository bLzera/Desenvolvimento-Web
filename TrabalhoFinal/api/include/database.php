<?php
require_once '../config.php';

class database {
    private static $instance = null;
    private $conx;

    private function __construct(){
        global $connectionString;
        $this->conx = pg_connect($connectionString);
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new database();            
        }
        return self::$instance->conx;
    }
}

?>