<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;



$app = new Application(dirname(__DIR__));

$app->router->get('/', [new SiteController(), 'home']);

$app->router->get('/contact', 'contact');

//$app->router->get('/contact', [new SiteController(), 'contact']);

$app->router->post('/contact', [new SiteController(), 'handleContact']);

$app->router->get('/login', [new AuthController(), 'login']);
$app->router->post('/login', [new AuthController(), 'login']);

$app->router->get('/register', [new AuthController(), 'register']);
$app->router->post('/register', [new AuthController(), 'register']);

$app->router->post('/testapi', function (){
    return "This API is only for testing purpose";
});

$app->run();