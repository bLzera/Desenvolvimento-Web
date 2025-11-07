<?php

$method = $_SERVER['REQUEST_METHOD'];
switch($method){
    case 'POST' : $params = $_POST;
    break;
    case 'GET' : $params = $_GET;
    break;
    default : throw new Exception('Invalid Method');
};

$teste = [1];

echo var_dump($teste);

$teste[] = 2;

echo var_dump($teste);

?>