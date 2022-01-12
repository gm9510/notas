<?php

namespace notas\src\controllers;

use  notas\src\core\Controller;
use  notas\src\core\Request;

class SiteController extends Controller
{
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
}

