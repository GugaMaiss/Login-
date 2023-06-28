<?php

namespace Controllers;

require_once __DIR__ . '/../Classes/Register.php';

use Classes\Register;

class RegisterController extends Register
{
    public function signupUser()
    {
        $this->validate((empty($_POST['username']) || empty($_POST['password']) || empty($_POST["password_repeat"]) || empty($_POST['email'])), 'empty input');
        $this->validate((!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)), 'Invalid email');
        $this->validate((!ctype_alnum($_POST['username'])), 'Invalid username');
        $this->validate(($_POST['password'] !== $_POST["password_repeat"]), 'Passwords don\'t match');
        $this->validate((!$this->checkUser($_POST['username'], $_POST['email'])), 'User name or email is already taken');

        $this->setUser($_POST['username'], $_POST['password'], $_POST['email']);
    }

    private function validate($statement,string $error)
    {
        if ($statement){
            header("location: ../public/index.php?error=$error");
            exit();
        }
    }
}