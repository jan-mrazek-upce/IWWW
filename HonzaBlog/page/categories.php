<nav class="sidenav">
    <?php
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $category = "";


    if (Authentication::getInstance()->hasIdentity()) {
        $user_id = $_SESSION['identity']['id'];
        $sql = "SELECT tag_name FROM tag where tag_id in (select tag_tag_id from user_has_tag where user_user_id='" . $user_id . "') order by tag_name ASC ";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) > 0) {
            echo "<h3>My categories</h3>";

            while ($row = mysqli_fetch_assoc($res)) {
                $tag_name = $row['tag_name'];
                $category .= "<a href=''>$tag_name</a>";
            }
            echo $category;
            $category = "";
        }
    }


    $sql = "SELECT tag_name FROM tag order by tag_name ASC";
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    if (mysqli_num_rows($res) > 0) {
        echo "<h3>All categories</h3>";

        while ($row = mysqli_fetch_assoc($res)) {
            $tag_name = $row['tag_name'];
            $category .= "<a href=''>$tag_name</a>";
        }
        echo $category;
    }
    ?>
</nav>
