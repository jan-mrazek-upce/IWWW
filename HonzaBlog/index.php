<?php
include_once("./config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="css/layout.css">
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

<main>
    <nav id="tabs-holder">
        <?php
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $category = "";
        if (isset($_SESSION['username'])) {
            $sql = "SELECT tag_name FROM tag where tag_id in (select tag_tag_id from user_has_tag where user_user_id='" . $_SESSION['user_id'] . "') order by ASC ";
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            if (mysqli_num_rows($res) > 0) {
                echo "<h3 class='categories'>My categories</h3>";

                while ($row = mysqli_fetch_assoc($res)) {
                    $tag_name = $row['tag_name'];
                    $category .= "<li><a href=''>$tag_name</a></li>";
                }
                echo $category;
                $category = "";
            }
        }

        $sql = "SELECT tag_name FROM tag order by tag_name ASC";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if (mysqli_num_rows($res) > 0) {
            echo "<h3 class='categories'>All categories</h3>";

            while ($row = mysqli_fetch_assoc($res)) {
                $tag_name = $row['tag_name'];
                $category .= "<li><a href=''>$tag_name</a></li>";
            }
            echo $category;
        }
        ?>
    </nav>


    <div class="ar-holder">
        <?php
        include("./page/article_list.php");
        ?>
    </div>
</main>

<footer>
    <?php
    include_once("./page/footer.php");
    ?>
</footer>

</body>

</html>