<?php

namespace notas\src\controllers;

use notas\src\core\Controller;
use notas\src\core\Request;
use notas\src\models\RegisterModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->setLayout('auth');
        return $this->render('login'); 
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();

        $this->setLayout('auth');
        if( $request->isPost() ) {

            $body = $request->getBody();
            $registerModel->loadData($body);


            if( $registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }

            return $this->render('register', [
                'model' => $registerModel
            ]);
        }

        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}
