<?php

class SignupContr extends Signup
{
    public $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid,$pwd ,$pwdRepeat ,$email){
        $this->uid = $uid;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }


    public function signupUser(){
        if(!$this->emptyInput()){
            header("location: ../index.php?error=empty input");
            exit();
        }
        if(!$this->invalidEmail()){
            header("location: ../index.php?error=email");
            exit();
        }
        if(!$this->invalidUid()){
            header("location: ../index.php?error=username");
            exit();
        }
        if(!$this->pwdMatch()){
            header("location: ../index.php?error=password");
            exit();
        }
        if(!$this->uidTakenCheck()){
            header("location: ../index.php?error=user or email taken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }



    private function emptyInput(){
//        $result ;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email) )  {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
//        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function invalidUid(){
//        $result;
        if (!ctype_alnum($this->uid)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function pwdMatch(){
//        $result;
        if ($this->pwd !== $this->pwdRepeat){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck(){
//        $result;
        if (!$this->checkUser($this->uid,$this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

}