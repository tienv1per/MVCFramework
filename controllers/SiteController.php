<?php

namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "TheShyCode"
        ];

        return $this->render('home', $params);
    }
    public function handleContact()
    {
        return "Handling submitted data";
    }
}