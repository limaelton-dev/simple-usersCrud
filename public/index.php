<?php

require_once __DIR__.'/../vendor/autoload.php';

$routes = require_once __DIR__. '/../config/routes.php';

$httpMethod = $_SERVER['REQUEST_METHOD'];

$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace("/public", "", $uri);
$uri = '/' . ltrim($uri, '/');


// var_dump($routes[$uri][$httpMethod]);die;
// var_dump($uri);die;
// var_dump($httpMethod);die;
// var_dump($httpMethod);die;
// var_dump(array_key_exists($uri, $routes));die;
// var_dump(array_key_exists($httpMethod, $routes[$uri]));die;
// var_dump($routes[$uri][$httpMethod]);die;

if(array_key_exists($uri, $routes) && array_key_exists($httpMethod, $routes[$uri])) {

    list($controllerName, $methodName) = explode('@', $routes[$uri][$httpMethod]);

    $controllerNamespace = 'app\\Controller\\'.$controllerName;

    if(class_exists($controllerNamespace)) {
        $controllerInstance = new $controllerNamespace();

        if(method_exists($controllerInstance, $methodName)) {
            $controllerInstance->$methodName();
        }
    }

} else {
    echo "<h1>Página não encontrada</h1>";
}
