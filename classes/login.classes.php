<?php


class Login extends Db
{
    protected function getUser($uid, $pwd)
    {
        $stmt = $this->connect()->prepare("SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ? ;");
        $values = array($uid,$pwd);


        if (!$stmt->execute($values)) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt =null;
            header("location: ../index.php?error=usernotfound1");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd,$pwdHashed[0]["users_pwd"] );
        var_dump($pwdHashed);

        if(!$checkPwd){
            $stmt =null;
            header("location: ../index.php?error=wrong password");
            exit();
        }
        elseif ($checkPwd == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');

            if (!$stmt->execute(array($uid,$uid, $pwd))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt =null;
                header("location: ../index.php?error=usernotfound 3");
                exit();
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];

            $stmt = null;
        }


        $stmt = null;
    }



}