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
    <title>WYSIWYG Example</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Alex-D/Trumbowyg/2.0.0-beta.7/dist/ui/trumbowyg.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <?php
    include("./header.php")
    ?>
</header>
<h1>This is WYSIWYG Example</h1>
<form action="post_create.php" method="post" enctype="multipart/form-data">
    <input placeholder="Title" name="title" type="text" autofocus size="48"><br><br>
    <textarea id="content-form" placeholder="Content" name="content" rows="20" cols="50"></textarea><br>
    <a style="margin: 5px; padding: 5px; background-color: #4a4a4a; color: white"
       onclick="myFunction();">BUTTON</a>
</form>


<form>
    <textarea id="form-description"></textarea>
    <p id="preview"></p>
    <a style="margin: 5px; padding: 5px; background-color: #4a4a4a; color: white"
       onclick="myFunction();">BUTTON</a>
</form>

<p id="convertedText">[PLACEHOLDER]</p>

<script>
    function myFunction() {
        document.getElementById("content").innerHTML = document.getElementById("content-form").value;
    }
</script>


<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/Alex-D/Trumbowyg/2.0.0-beta.7/dist/trumbowyg.min.js"></script>
<script>
    $('#content-form').trumbowyg();
</script>
</body>
</html>