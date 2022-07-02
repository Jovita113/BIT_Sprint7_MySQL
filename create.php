<?php

include("db.php");

if (isset($_POST['create'])) {
    $projectname = $_POST['projectname'];

    $sql = "INSERT INTO projects(projectname) VALUES ('$projectname')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = 'Project created successfully';
    $_SESSION['message_type'] = 'success';

    header("location: index.php");
}

?>
