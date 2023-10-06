<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\Router;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "TheShyCode"
        ];

        return $this->render('home', $params);
    }
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        exit;
        return "Handling submitted data";
    }
}