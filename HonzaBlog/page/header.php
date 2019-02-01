<?php

?>

<div id="header-web-title">Honza tech tips</div>

<?php
if (!isset($_SESSION['username'])) {
    echo "<div id='login-registration'><a href='./page/login.php'><h4>Login</h4></a>&nbsp;<a href='./page/register.php'><h4>Register</h4></a> </div>";
}
?>

<nav id="main-nav">
    <a href="">Home</a>
    <a href="#">About me</a>
    <a href="#">Contact me</a>
</nav>


