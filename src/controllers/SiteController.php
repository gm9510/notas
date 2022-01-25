<?php

namespace notas\src\controllers;

use notas\src\core\Controller;
use notas\src\core\Request;
use notas\src\core\middlewares\AuthMiddleware;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function home() {
        $params = [
            'name' => "EvilTomato"
        ];
        return $this->render('home', $params);
    }

    public function contact() 
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request) 
    {
        $body = $request->getBody();
        echo "<pre>";
        echo var_dump($body);
        echo "</pre>";
        exit;
        
        return $this->render('contact');
    }

    public function profile(Request $request)
    {
        return $this->render('profile');
    }
}
