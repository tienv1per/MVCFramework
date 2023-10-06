<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';
    public function render($view, $params)
    {
        $req = new Request();
        $res = new Response();
        $router = new Router($req, $res);
//        echo $this->layout;
//        exit;
        return $router->renderView($view, $this->layout, $params);
    }

    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }
}