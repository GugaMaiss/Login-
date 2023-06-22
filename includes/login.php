<?php


if (isset($_POST['submit'])) {
    // Grabbing the data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];


    //instantiate Sing-up contr class
    include "../classes/db.php";
    include "../classes/login.classes.php";
    include "../classes/login.contr-classes.php";

    $login= new LoginContr($uid, $pwd);

    //Running error handlers and user signup
    $login->loginUser();

    //Going back to main page
    header("location: ../index.php?error=none");
}


