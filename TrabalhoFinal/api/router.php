<?php

class router {
    public function __construct(private string $uri, private string $method){}

    public function run(){
        $routes = [
            //'METHOD URI' => ['nomeController', 'nomeAcao']

            /**
             * endpoint que busca as perguntas do formulário;
             * 
             * @body params:
             * setid (int, opcional);
             * caso seja fornecido, retorna as perguntas relacionadas ao ID do setor informado;
             * caso não seja fornecido, retorna todas as perguntas;
             */
            'POST getPerguntas' => ['controllerPerguntas', 'getPerguntas'],

            
            'POST addPergunta'  => ['controllerPerguntas', 'addPergunta'],

            /**
             * endpoint que realiza a adição de uma avaliação;
             * 
             * @body params:
             * setid (int, obrigatório);
             * id do setor do dispositivo que está realizando a requisição;
             * 
             * disid (int, obrigatório);
             * id do dispositivo que está realizando a requisição;
             * 
             * avatexto (text, opcional);
             * texto opcional que complementa a avaliação realizada;
             * 
             * respostas (array de objeto de resposta);
             * resposta:
             *      perid (int, obrigatório);
             *      id da pergunta que está sendo respondida;
             *      
             *      valor (int, obrigatório, 0 a 10);
             *      valor da resposta para a pergunta, sendo o valor mínimo 0 e máximo 10;
             */
            'POST addAvaliacao' => ['controllerAvaliacao', 'addAvaliacao'],
        ];
        
        $key = $this->getmethod() . ' ' . $this->getUri();

        if(!isset($routes[$key])){
            http_response_code(404);
            echo json_encode(['erro' => 'Rota não encontrada', 'detalhe' => 'método '. $this->getMethod(). ' e ação '.$this->getUri()]);
            return;
        }

        [$controllerName, $action] = $routes[$key];

        require_once "controller/$controllerName.php";

        $controller = new $controllerName();

        echo json_encode($controller->$action());
    }

    private function getMethod(){
        return $this->method;
    }

    private function getUri(){
        return $this->uri;
    }
}

?>