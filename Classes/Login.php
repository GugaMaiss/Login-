<?php

namespace Classes;

require_once __DIR__ . '/DB.php';

use JetBrains\PhpStorm\NoReturn;
use PDO;

class Login extends DB
{
    public function __construct()
    {
        session_start();
    }

    private function getUser($uid, $password)
    {
        $statement = $this->connect()->prepare("SELECT * FROM users WHERE username = ? OR email = ? ;");

            !$statement->execute([$uid, $password]) ?? header("location: ../public/index.php?error=statement_failed");
            $statement->rowCount() === 0 ?? header("location: ../public/index.php?error=user_not_found");

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    #[NoReturn] protected function checkUser($uid, $pwd)
    {
        $user = $this->getUser($uid, $pwd);

        $checkPwd = password_verify($pwd, $user["password"]);

        if ($checkPwd) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_username"] = $user["username"];

            header("location: ../public/index.php?status=Logged_in!");
            exit();
        }

        header("location: ../public/index.php?error=wrong password");
        exit();
    }
}