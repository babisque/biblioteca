<?php

require_once __DIR__ . '/../vendor/autoload.php';

$path = $_SERVER['PATH_INFO'];
$routes = require_once __DIR__ . '/../config/routes.php';

if (!array_key_exists($path, $routes)) {
    http_response_code(404);
    exit();
}

session_start();

/*$loginRoute = stripos($path, 'login');
if (!isset($_SESSION['loggedin']) && $loginRoute === false && $path = '') {
    header('Location: /login');
    exit();
}*/

$controllerClass = $routes[$path];
$controller = new $controllerClass;
$controller->request();