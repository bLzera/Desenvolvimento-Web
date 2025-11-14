<?php
require_once 'include/database.php';

class collection{
    private $db;

    public function __construct(){
        $this->db = database::getInstance();
    }
}

?>