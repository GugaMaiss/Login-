<?php

if(isset($_POST['submit']))
{
    // Grabbing the data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    //instantiate Sing-up contr class
    include "../classes/db.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.php";

    $signup = new SignupContr($uid,$pwd,$pwdRepeat,$email);

    //Running error handlers and user signup
     $signup->signupUser();

    //Going back to main page
    header("location: ../index.php?error=none");
}

