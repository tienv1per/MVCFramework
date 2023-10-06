<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\controllers\SiteController;



$app = new Application(dirname(__DIR__));

$app->router->get('/', [new SiteController(), 'home']);

$app->router->get('/contact', 'contact');

//$app->router->get('/contact', [new SiteController(), 'contact']);

$app->router->post('/contact', [new SiteController(), 'handleContact']);

$app->router->post('/testapi', function (){
    return "This API is only for testing purpose";
});

$app->run();