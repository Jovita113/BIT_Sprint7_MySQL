<?php

include("db.php");

if (isset($_GET['EmployeeID'])) {
    $employeeid = $_GET['EmployeeID'];
    $sql1 = "SELECT * FROM employees WHERE EmployeeID = $employeeid";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) == 1) {
        $row = mysqli_fetch_array($result1);
        $employeename = $row['EmployeeName'];
    }
}


if (isset($_POST['updateEM'])) {
    $employeeid = $_GET['EmployeeID'];
    $employeename = $_POST['EmployeeName'];
   
    $sql1 = "UPDATE employees SET EmployeeName = '$employeename' WHERE EmployeeID = $employeeid";
    mysqli_query($conn, $sql1);
    
    $_SESSION['message'] = 'Updated Successfuly';
    $_SESSION['message_type'] = 'warning';

    header("location: employees.php");
}

?>

<?php include 'includes/header.php'; ?>

<?php include 'includes/navbar.php'; ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="update_employee.php?EmployeeID=<?php echo $_GET['EmployeeID']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="EmployeeName" value="<?php echo $employeename; ?>" class="form-control" placeholder="Update name">
                    </div>
                    <button class="btn btn-success mt-3" name="updateEM">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>