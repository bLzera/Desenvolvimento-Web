<?php
require_once 'controller/controller.php';
require_once 'model/modelPergunta.php';


class controllerPerguntas extends controller{
    public function __construct(){

    }

    public function getPerguntas(){
        $model = new modelPergunta();
        $result = $model->listarPorSetor(3);
        return $result;
    }

    public function addPergunta(){
        $model = new modelPergunta();
    }
}

?>