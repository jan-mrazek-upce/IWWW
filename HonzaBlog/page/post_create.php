<?php
include_once("../config.php");

if (isset($_POST['post'])) {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);

    $title = mysqli_real_escape_string($conn, $title);
    $content = mysqli_real_escape_string($conn, $content);

    $date = date("l jS \of F Y h:i:s");

    $sql = "INSERT into article(headline, content, date_posted) VALUES ('$title', '$content', '$date')";

    if ($title == "" || $content == "") {
        echo "Post incomplete!";
        return;
    }

    mysqli_query($conn, $sql);
    header("Location: ../index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Honza tech tips - Post</title>

</head>

<body>

<main>
    <form action="post_create.php" method="post" enctype="multipart/form-data">
        <input placeholder="Title" name="title" type="text" autofocus size="48"><br><br>
        <textarea placeholder="Content" name="content" rows="20" cols="50"></textarea><br>
        <input name="post" type="submit" value="Post">
    </form>


</main>
</body>

</html>