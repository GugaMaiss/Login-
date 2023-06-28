<?php

namespace Controllers;

require_once __DIR__ . '/../Classes/Login.php';

use Classes\Login;

class LoginController extends Login
{
    public function loginUser()
    {
        if (empty($_POST['username'] || $_POST['password'])) {
            header("location: ../index.php?error=empty input");
        }

        $this->checkUser($_POST['username'], $_POST['password']);
    }
}