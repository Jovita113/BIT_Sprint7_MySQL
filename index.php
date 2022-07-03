<?php include("db.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/header.php'; ?>
</head>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset();
                } ?>
                <div class="card card-body">
                    <form action="create.php" method="POST">
                        <div class="form-group mb-4">
                            <input type="text" name="projectname" class="form-control" placeholder="project title" autofocus>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" class="btn btn-success  btn-block" name="create" value="Create project">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Project</th>
                            <th>Employees</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT projects.*, group_concat(EmployeeName) as combinedEmp
                                FROM employees
                                RIGHT JOIN projects ON projects.ID = employees.ProjectID
                                GROUP BY ProjectName 
                                ORDER BY ID";
                        
                        $result_projects = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result_projects)) { ?>
                            <tr>
                                <td><?php echo $row['ID'] ?></td>
                                <td><?php echo $row['ProjectName'] ?></td>
                                <td><?php echo $row['combinedEmp'] ?></td>
                                <td>
                                    <a href="update_project.php?ID=<?php echo $row['ID']?>" class="btn btn-secondary">
                                        <i class="fa-solid fa-marker"></i>
                                    </a>
                                    <a href="delete_project.php?ID=<?php echo $row['ID']?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <?php include 'includes/script.php'; ?>
</body>

</html>