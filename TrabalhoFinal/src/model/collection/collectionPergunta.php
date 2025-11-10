<?php
require_once 'include/database.php';

class collectionResposta extends database{
    private $respostas;

    public function __construct(){
        $this->respostas = array();
    }

    
}

?>