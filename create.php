<?php

include 'db.php';

if (isset($_POST['create'])) {

    if(!empty($_POST['ProjectName'])) {
        $projectname = ($_POST['ProjectName']);

        $sql = "INSERT INTO projects (ProjectName) VALUES (?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            $param_name = $projectname;

            if(mysqli_stmt_execute($stmt)){
                $_SESSION['message'] = 'Project created successfully';
                $_SESSION['message_type'] = 'success';
                header("location: index.php"); 
            }
        }
        mysqli_stmt_close($stmt);

    } else {
        $_SESSION['message'] = 'Failed! Write the name of the project!';
        $_SESSION['message_type'] = 'danger';
        header("location: index.php");
    } 
}
?>