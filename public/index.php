<?php session_start(); ?>

<ul class="menu-member">
    <?php if (isset($_SESSION["user_id"])) { ?>
        <li><a href="#"><?php echo $_SESSION["user_username"]; ?> </a></li>
        <li><a href="../Includes/logout.php" class="header-login-a">Logout</a></li>
    <?php } ?>
</ul>

<section class="index-login">
    <div class="wrapper">
        <div class="index-login-signup">
            <h4>Sign up</h4>
            <p>Don't have an account? Sign up here!</p>
            <form action="../Includes/register.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_repeat" placeholder="Repeat password">
                <input type="text" name="email" placeholder="E-mail">
                <br>
                <button type="submit" name="submit">Sign up</button>
            </form>
        </div>
        <section class="index-login">
            <div class="wrapper">
                <div class="index-login-signup">
                    <h4>Login</h4>
                    <p>Don't have an account? Sign up here!</p>
                    <form action="../Includes/login.php" method="post">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <br>
                        <button type="submit" name="submit">Log in</button>
                    </form>
                </div>
            </div>
        </section>