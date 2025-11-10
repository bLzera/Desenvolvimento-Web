<?php

require_once 'router.php';
require_once '../config.php';

$uri = explode('/', $_SERVER['REQUEST_URI']);
$uri = $uri[array_key_last($uri)];
$method = $_SERVER['REQUEST_METHOD'];

$router = new router($uri, $method);
$router->run();
?>