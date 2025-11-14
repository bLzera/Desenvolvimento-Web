<?php
require_once 'model/model.php';

class modelResposta extends model {
    private $resid;
    private $avaid;
    private $perid;
    private $resvalor;

    public function __construct(){
        parent::__construct();
    }

    public function salvarResposta(){
        $stmt = 'insert into tbresposta (avaid, perid, resvalor) values ($1, $2, $3)';
        $params = [$this->avaid, $this->perid, $this->resvalor];
        return $this->runInsert($stmt, $params);
    }

    public function getResid(){
        return $this->resid;
    }

    public function getAvaid(){
        return $this->avaid;
    }

    public function getPerid(){
        return $this->perid;
    }
    
    public function getResvalor(){
        return $this->resvalor;
    }            
    
    public function setResid($resid){
        $this->resid = $resid;
        return $this;
    }
    
    public function setAvaid($avaid){
        $this->avaid = $avaid;
        return $this;
    }        
    
    public function setPerid($perid){
        $this->perid = $perid;
        return $this;
    }
    
    public function setResvalor($resvalor){
        $this->resvalor = $resvalor;
        return $this;
    }
}

?>