<?php

namespace app\core;

class Controller
{
    public function render($view, $params)
    {
        $req = new Request();
        $res = new Response();
        $router = new Router($req, $res);
        return $router->renderView($view, $params);
    }
}