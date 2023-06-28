<?php

namespace Classes;

require_once __DIR__ . '/DB.php';

class Register extends DB
{
    protected function setUser($uid, $pwd, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (username, password, email) VALUES (?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            !$stmt->execute([$uid, $hashedPwd, $email]) ?? header("location: ../public/index.php?status=statement_failed");

        header("location: ../public/index.php?status=registered");
        exit();
    }

    protected function checkUser($uid, $email): bool
    {
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

            !$stmt->execute([$uid, $email]) ?? header("location: ../public/index.php?status=statement_failed");

        return !($stmt->rowCount() > 0);
    }
}