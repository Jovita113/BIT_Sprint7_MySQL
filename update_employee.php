<?php

include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql1 = "SELECT * FROM employees WHERE id = $id";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) == 1) {
        $row = mysqli_fetch_array($result1);
        $firstname = $row['firstName'];
        $lastname = $row['lastName'];
    }
} 

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
   
    if (empty($_POST['ProjectName'])) {
        
        $sql1 = "UPDATE employees SET firstName ='$firstname', lastName = '$lastname' WHERE id = $id";
        $result = mysqli_query($conn, $sql1);
        if (!$result){
            die("Query filed");
        }

        $_SESSION['message'] = 'Updated Successfuly';
        $_SESSION['message_type'] = 'warning';
        header("location: employees.php"); 
        
    }  else {
        $projectname= $_POST['ProjectName'];
        $sql2 = "UPDATE employees SET firstName ='$firstname', lastName = '$lastname', addedProject = '$projectname' WHERE id = $id";
        $result1 = mysqli_query($conn, $sql2);
        if (!$result1){
            die("Query filed");
        }

        $_SESSION['message'] = 'Updated Successfuly';
        $_SESSION['message_type'] = 'warning';
        header("location: employees.php"); 
    }           
} 
     
?>

<?php include 'includes/header.php'; ?>

<?php include 'includes/navbar.php'; ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="update_employee.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <p style="text-align:center; color:green"; ><b>Editing the employee info</b></p>
                        <input type="text" name="firstName" value="<?php echo $firstname; ?>" class="form-control" placeholder="first name" />
                    </div>
                    <div class="form-group mt-4">   
                        <input type="text" name="lastName" value="<?php echo $lastname; ?>" class="form-control" placeholder="last name" />
                    </div>
                    <div  class="form-group mt-4">
                        <select name="ProjectName">
                            <option value="0">PROJECT</option>
                            <?php
                                $sql = 'SELECT * FROM projects';
                                $result_projects = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result_projects)) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['ProjectName'] ;?></option>
                                <?php } ?>
                        </select>
                    </div> 
                    <input type="submit" name="submit" value="Update" class="btn btn-success mt-3" />
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>