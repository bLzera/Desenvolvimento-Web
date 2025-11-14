<?php
require_once 'model.php';
require_once 'model/collection/collectionResposta.php';

class modelAvaliacao extends model {
    private $avaid;
    private $disid;
    private $setid;
    private $avatexto;
    private $avadata;
    private collectionResposta $respostas;

    public function __construct(){
        parent::__construct();
    }

    public function salvarAvaliacao(){
        $this->beginTransaction();

        try {
            $stmt = "
                insert into tbavaliacao (disid, setid, avatexto, avadata)
                values ($1, (select setid from tbdispositivo where disid = $1), $2, now())
                returning avaid
            ";

            $res = $this->runInsert($stmt, [$this->disid, $this->avatexto]);
            $row = pg_fetch_assoc($res);
            $avaid = $row['avaid'];

            $this->respostas->saveAll($avaid);

            $this->commitTransaction();

            return $avaid;

        } catch (Exception $e) {
            $this->rollbackTransaction();
            throw $e;
        }
    }

    public function getAvaid(){
        return $this->avaid;
    }

    public function getDisid(){
        return $this->disid;
    }
    
    public function getSetid(){
        return $this->setid;
    }
    
    public function getAvatexto(){
        return $this->avatexto;
    }
    
    public function getAvadata(){
        return $this->avadata;
    }
    
    public function getRespostas(){
        return $this->respostas;
    }
    
    public function setAvaid($avaid){
        $this->avaid = $avaid;
        return $this;
    }    

    public function setDisid($disid){
        $this->disid = $disid;
        return $this;
    }    

    public function setSetid($setid){
        $this->setid = $setid;
        return $this;
    }    
    
    public function setAvatexto($avatexto){
        $this->avatexto = $avatexto;
        return $this;
    }    
    
    public function setAvadata($avadata){
        $this->avadata = $avadata;
        return $this;
    }        

    public function setRespostas($respostas){
        $this->respostas = $respostas;
        return $this;
    }            
}

?>