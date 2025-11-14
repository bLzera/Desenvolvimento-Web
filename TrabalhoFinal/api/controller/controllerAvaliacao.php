<?php
require_once 'controller/controller.php';
require_once 'model/modelResposta.php';
require_once 'model/modelAvaliacao.php';
require_once 'model/collection/collectionResposta.php';

class controllerAvaliacao extends controller {
    public function __construct(){}

    public function addAvaliacao(){
        $data = json_decode(file_get_contents('php://input'), true);
        $respostas = new collectionResposta();

        //todo
        //implementar service de validações de request (requestValidator)
        /**
         * $validate = requestValidator::validate($data, array(
         *      [
         *      'campo' => 'perid',
         *      'tipo'  => 'int'
         *      ],
         *      [
         *      'campo' => 'valor',
         *      'tipo'  => 'int'
         *      ]
         * ));
         * 
         * if($validate['res']){
         *  
         * } else {
         *    throw new Exception($validate['erro']);
         * }
         */

        foreach($data['respostas'] as $resposta){
            $modelResposta = new modelResposta();
            $modelResposta->setPerid($resposta['perid']);
            $modelResposta->setResvalor($resposta['valor']);
            $respostas->add($modelResposta);
        }

        $modelAvaliacao = new modelAvaliacao();
        $modelAvaliacao->setRespostas($respostas);
        $modelAvaliacao->setDisid($data['disid']);
        if(isset($data['avatexto'])){
            $modelAvaliacao->setAvatexto($data['avatexto']);
        }        

        return json_encode($modelAvaliacao->salvarAvaliacao());
    }
}

?>