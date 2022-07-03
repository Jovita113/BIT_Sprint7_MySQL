<?php

    include("db.php");

    if (isset($_GET['ID'])) {
        $id = $_GET['ID'];

        $sql = "DELETE FROM projects WHERE ID = $id";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] = 'Project removed successfully';
        $_SESSION['message_type'] = 'danger';

        header("location: index.php");
    }

?>