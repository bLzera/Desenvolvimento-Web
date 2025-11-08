<?php
require_once '../../config.php';

class database {
    private static $instance = null;
    private $conx;

    private function __constructor(){
        $this->conx = pg_connect($connectionString);
    }

    public function getInstance(){
        if(self::$instance){
            self::$instance = new database();            
        }
        return self::$instance->conx;
    }
}

?>