<?php
ob_start();
session_start();
include_once "./config.php";

spl_autoload_register(function ($class) {
    include './class/' . $class . '.php';
});

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Honza tech tips</title>


</head>

<body>


<header>

    <?php
    include("./page/header.php");
    ?>

</header>

<nav>

    <?php
    include "./page/categories.php"
    ?>

</nav>

<main>

    <?php
    if (isset($_GET['page'])) {
        $file = "./page/" . $_GET["page"] . ".php";
        if (file_exists($file)) {
            include $file;
        } else {
            include "./page/404.php";
        }
    } else {
        if (Authentication::getInstance()->hasIdentity()) :
            echo "<h2>Je prihlasen " . Authentication::getInstance()->getIdentity()["username"] . "</h2>";
        else : ?>
            <h2>Nikdo neni prihlasen</h2>
        <?php endif;
    }
    ?>


    <?php
    include("./page/article_list.php");
    ?>


</main>

<footer>
    <?php
    include_once("./page/footer.php");
    ?>
</footer>

</body>

</html>