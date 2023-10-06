<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('login', []);
    }

    public function register(Request $request)
    {
        if($request->isPost()){
            echo '<pre>';
            var_dump($request->getBody());
            echo '</pre>';
            return "Handle submitted data for register page";
        }
        $this->setLayout('register');
        return $this->render('register', []);
    }
}