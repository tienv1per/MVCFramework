<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;



$app = new Application(dirname(__DIR__));

$app->router->get('/', function (){
    return "Hello World";
});

$app->router->get('/contact', 'contact');


$app->run();