<?php
//include_once("../config.php");
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$sql = "SELECT * FROM article ORDER BY article_id DESC";
$res = mysqli_query($conn, $sql) or die(mysqli_error());
$posts = "";
$admin = "";
if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
    $admin = "<div><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<a href='edit_post.php?pid=$id'>Edit</a>";
}


if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['article_id'];
        $title = $row['headline'];
        $content = $row['content'];
        $date = $row['date_posted'];


        //$output = $bbcode->Parse($content);
        $output = $content;
        $posts .= "<div><h2><a href='post_view.php?pid=$id'>$title</a></h2><h3>$date</h3><p>$output</p>$admin<hr></div>";
    }
    echo $posts;
} else {
    echo "There are no posts to display!";
}
?>