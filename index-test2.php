<?php
require 'vendor/autoload.php';
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$router = new RouteCollector();
$router->get('/', function(){
    echo 'Hello, PHRoute!';
});

$router->post('producto', function(){
    print_r($_POST);
});

$router->put('items/{id}', function($id){
  echo 'Amend Item ' . $id;
});

// $dispatcher =  new Dispatcher($router->getData());
// echo $dispatcher->dispatch('GET', '/');   // Home Page

$dispatcher =  new Dispatcher($router->getData());
$dispatcher->dispatch('GET', '/');// Home Page
$dispatcher->dispatch('POST', 'producto');// Home Page
$dispatcher->dispatch('PUT', 'items/7');// Amend Item 5
