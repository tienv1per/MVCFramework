<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\core\Router;

class SiteController
{
    public function home()
    {
        $req = new Request();
        $res = new Response();
        $router = new Router($req, $res);
        $params = [
            'name' => "TheShyCode"
        ];

        return $router->renderView('home', $params);
    }
    public function handleContact()
    {
        return "Handling submitted data";
    }
}