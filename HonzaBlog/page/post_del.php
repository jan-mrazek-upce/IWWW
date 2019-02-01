<?php
include_once("../config.php");
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($_SESSION['username'] == "admin") {
    if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $sql = "DELETE FROM article WHERE article_id=$pid";
        mysqli_query($conn, $sql);
        header("Location:" . BASE_URL);
    } else {
        header("Location:" . BASE_URL);
    }
}
?>