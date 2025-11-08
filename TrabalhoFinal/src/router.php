<?php

class router {
    public function __construct(private string $uri, private string $method){}

    public function run(){
        $routes = [
            //'METHOD URI' => ['nomeController', 'nomeAcao']
            'POST getPerguntas' => ['controllerPerguntas', 'getPerguntas'],
            'POST addPergunta'  => ['controllerPerguntas', 'addPergunta'],
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