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
    <title>HTT - Create Article</title>

</head>
<body>
<header>
    <?php
    include("./header.php")
    ?>
</header>
<form action="" method="post">
    <textarea name="editor1"></textarea>

    <input type="submit" value="vlozit">
</form>
<?php
if (isset($_POST['editor1'])) {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $text = $_POST['editor1'];
    $sql = ("INSERT INTO semestralka.aktuality (text,datum_vytvoreni)  VALUES ('" . $_POST["editor1"] . "', now())");

    if ($conn->query($sql) === TRUE) {
        $message_login = 'text úspěšně přidán.';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    echo $message_login;
}


?>



<script>
    CKEDITOR.replace('editor1');
</script>
</body>
</html>