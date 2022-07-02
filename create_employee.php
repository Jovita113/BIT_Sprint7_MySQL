<?php

include("db.php");

if (isset($_POST['createEM'])) {
    $employeename = $_POST['employeeName'];

    $sql = "INSERT INTO employees(employeeName) VALUES ('$employeename')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = 'successfully';
    $_SESSION['message_type'] = 'success';

    header("location: employees.php");
}
?>
