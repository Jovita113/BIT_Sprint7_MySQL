<?php

    include 'db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM employees WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] = 'Employee removed successfully';
        $_SESSION['message_type'] = 'danger';
        header("location: employees.php");
    }
?>