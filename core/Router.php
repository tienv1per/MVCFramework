<?php

namespace app\core;

class Router
{
    protected array $routes = [
        'get' => [
        ],
        'post' => [
        ]
    ];
    public Request $request;
    public Response $response;
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function renderView($view, $layout, $params=[])
    {
        $layoutContent = $this->layoutContent($layout);
        $viewContent  = $this->renderOnlyView($view, $params);
//        echo '<pre>';
//        var_dump($layoutContent);
//        echo '</pre>';

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function layoutContent($layout)
    {
        ob_start(); // start output caching
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean(); // clear buffer
    }

    public function renderOnlyView($view, $params=[])
    {
        foreach ($params as $key => $value){
            //$key = name => $$key = $name
            $$key = $value;
        }
//        echo '<pre>';
//        var_dump($params);
//        echo '</pre>';
        ob_start(); // start output caching
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean(); // clear buffer
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }

        // this is view file
        if(is_string($callback)){
            return $this->renderView($callback);
        }

        if(is_array($callback)){
            //same as $callback[0] = new $callback[0]();
            $instance = new $callback[0]();
            $callback[0] = $instance;
        }
//        echo '<pre>';
//        var_dump($callback);
//        echo '</pre>';
//        exit;
        return call_user_func($callback, $this->request);
    }
}