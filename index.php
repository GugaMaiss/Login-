<?php
    session_start();
?>


<ul class="menu-member">
    <?php
        if(isset($_SESSION["userid"]))
        {
    ?>
    <li> <a href="#"><?php echo $_SESSION["useruid"]; ?> </a> </li>
    <li> <a href="includes/logout.php" class="header-login-a">Logout</a> </li>
     <?php
        }
        else
        {
    ?>
    <li> <a href="#">Sign up</a> </li>
    <li> <a href="#" class="header-login-a">Login</a> </li>
  <?php
    }
    ?>
</ul>

<section class="index-login">
    <div class="wrapper">
        <div class="index-login-signup">
            <h4>Sign up</h4>
            <p>Don't have an account? Sign up here!</p>
            <form action="includes/sign-up.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwdrepeat" placeholder="Repeat password">
                <input type="text" name="email" placeholder="E-mail">
                <br>
                <button type="submit" name="submit" >Sign up</button>
            </form>
        </div>
        <section class="index-login">
            <div class="wrapper">
                <div class="index-login-signup">
                    <h4>Login</h4>
                    <p>Don't have an account? Sign up here!</p>
                    <form action="includes/login.php" method="post">
                        <input type="text" name="uid" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <br>
                        <button type="submit" name="submit" >Log in</button>
                    </form>
                </div>


            </div>
</section>