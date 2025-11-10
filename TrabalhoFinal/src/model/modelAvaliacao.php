<?php
require_once 'model.php';

class modelAvaliacao extends model {
    private $avaid;
    private $disid;
    private $setid;
    private $avatexto;
    private $avadata;

    public function __construct($tablename = 'tbavaliacao'){
        parent::__construct($tablename);
    }
}

?>