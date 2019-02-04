<h1>Login</h1>

<?php
#include_once "../config.php";
#spl_autoload_register(function($class) {
#   include '../class/' . $class . '.php';
#});

if (!empty($_POST) && !empty($_POST["loginMail"]) && !empty($_POST["loginPassword"])) {
    $authService = Authentication::getInstance();
    if ($authService->login($_POST["loginMail"], $_POST["loginPassword"])) {
        header("Location:" . BASE_URL);
        exit;
    } else {
        echo "User not found";
    }
} else if (!empty($_POST)) {
    echo "Username and password are required";
}

?>


<form method="post">

    <input type="email" name="loginMail" placeholder="Insert your email">
    <input type="password" name="loginPassword" placeholder="Password">
    <input type="submit" value="Log in">

</form>