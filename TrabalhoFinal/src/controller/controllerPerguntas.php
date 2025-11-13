<?php
require_once 'controller/controller.php';
require_once 'model/modelPergunta.php';


class controllerPerguntas extends controller{
    public function __construct(){

    }

    public function getPerguntas(){
        $data = json_decode(file_get_contents('php://input'), true);
        $model = new modelPergunta();
        if(!isset($data['setid'])){
            return $model->buscaTodasPerguntas();
        }
        return $model->listarPorSetor($data['setid']);
    }

    public function addPergunta(){
        $model = new modelPergunta();
    }
}

?>