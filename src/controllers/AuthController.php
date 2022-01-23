<?php

namespace notas\src\controllers;

use notas\src\core\Controller;
use notas\src\core\Request;
use notas\src\models\UserModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->setLayout('auth');
        return $this->render('login'); 
    }

    public function register(Request $request)
    {
        $user = new UserModel();

        $this->setLayout('auth');
        if( $request->isPost() ) {

            $body = $request->getBody();
            $user->loadData($body);


            if( $user->validate() && $user->save()) {
                Application::$app->response->redirect('/');
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }

        return $this->render('register', [
            'model' => $user
        ]);
    }
}
