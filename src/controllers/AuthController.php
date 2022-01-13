<?php

namespace notas\src\controllers;

use notas\src\core\Controller;
use notas\src\core\Request;
use notas\src\model\RegisterModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->setLayout('auth');
        return $this->render('login'); 
    }

    public function register(Request $request)
    {
        if( $request->isPost() ) {
            return 'Handle submitted data';
        }

        return $this->render('register');
    }
}
