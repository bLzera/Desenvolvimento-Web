<?php
require_once 'model/collection/collection.php';

class collectionResposta extends collection{
    private $respostas;

    public function __construct(){
        $this->respostas = array();
    }

    public function add($resposta){
        $this->respostas[] = $resposta;
        return $this;
    }

    public function saveAll($avaid){
        foreach($this->respostas as $resposta){
            $resposta->setAvaid($avaid);
            $resposta->salvarResposta();
        }
    }
}


?>