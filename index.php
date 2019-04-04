<?php
require './vendor/autoload.php';
// require './vendor/phroute/phroute/src/Phroute/RouteCollector.php';
// require './vendor/phroute/phroute/src/Phroute/Dispatcher.php';
// require './vendor/phroute/phroute/src/Phroute/Exception/HttpRouteNotFoundException.php';
// require './vendor/phroute/phroute/src/Phroute/Exception/HttpMethodNotAllowedException.php';
require './mvc/controller/LoginUser.php';
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
$router = new RouteCollector();
// DEFINIR RUTA(/page), DEFINIR CLASS (Page). Asegurarse de importar class
// (require './Page.php')
$router->controller('/login', "LoginUser");

$rutaCompleta = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER['REQUEST_METHOD'];
$rutaLimpia = processInput($rutaCompleta);

#Dispatch
$dispatcher = (new Dispatcher($router->getData()));
//$dispatcher->dispatch($metodo,$rutaLimpia);

try {
    echo $dispatcher->dispatch($metodo, $rutaLimpia); # Mandar sólo el método y la ruta limpia
} catch (HttpRouteNotFoundException $e) {
    echo "Error: Ruta no encontrada";
} catch (HttpMethodNotAllowedException $e) {
    echo "Error: Ruta encontrada pero método no permitido";
}


function processInput($uri)
{
    return implode('/',
        array_slice(
            explode('/', $uri), 3));
}

//dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'])
//$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));


//$dispatcher->dispatch('GET', '/page'); //PAGE - ANY index
//$dispatcher->dispatch('PUT', '/page'); //PAGE - ANY index


//$dispatcher->dispatch('GET', '/page/page'); //PAGE - GET method
