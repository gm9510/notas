<?php

namespace notas\src\models;
use notas\src\core\Model;


class RegisterModel extends Model
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public string $confirmPassword;

    public function register() 
    {
        echo 'Creating new user';
    }

}
