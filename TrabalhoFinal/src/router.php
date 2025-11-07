<?php

class router {
    public function __construct(private string $path, private string $method){}

    public function run(){
        $routes = [
            //'METHOD URI' => ['nomeController', 'nomeAcao']
        ];
        
        $key = $this->getmethod() . ' ' . $this->getPath();

        if(!isset($routes[$key])){
            http_response_code(404);
            echo json_encode(['erro' => 'Rota não encontrada']);
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

    private function getPath(){
        return $this->path;
    }
}

?>