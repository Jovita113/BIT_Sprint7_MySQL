<?php

include 'db.php';

if (isset($_POST['createEM'])) {

    if (!empty($_POST['firstName'])&&!empty($_POST['lastName'])) {
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        
        $sql = "INSERT INTO employees(firstName, lastName) VALUES ('$firstname', '$lastname')";
        mysqli_query($conn, $sql);

        $_SESSION['message'] = 'Created successfully';
        $_SESSION['message_type'] = 'success';
        header("location: employees.php");

    } else {

        $_SESSION['message'] = 'Failed! Write the name and lastname!';
        $_SESSION['message_type'] = 'danger';
        header("location: employees.php");
    }
}
?>