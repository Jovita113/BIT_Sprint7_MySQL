<?php

include("db.php");

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM projects WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $projectname = $row['ProjectName'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['ID'];
    $projectname = $_POST['ProjectName'];

    $sql = "UPDATE projects SET ProjectName = '$projectname' WHERE ID = $id";
    mysqli_query($conn, $sql);

    $_SESSION['message'] = 'Project Updated Successfuly';
    $_SESSION['message_type'] = 'warning';
    
    header("location: index.php");
}

?>

<?php include 'includes/header.php'; ?>

<?php include 'includes/navbar.php'; ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="update_project.php?ID=<?php echo $_GET['ID']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="ProjectName" value="<?php echo $projectname; ?>" class="form-control" placeholder="Update project">
                    </div>
                    <button class="btn btn-success mt-3" name="update">
                        Update project
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>