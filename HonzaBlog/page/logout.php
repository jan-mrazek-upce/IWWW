<?php
spl_autoload_register(function ($class) {
    include '../class/' . $class . '.php';
});
Authentication::getInstance()->logout();
header("Location:" . BASE_URL);
?>