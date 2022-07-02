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
                            <input type="submit" class="btn btn-success  btn-block" name="create" value="Create">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <?php include 'includes/script.php'; ?>
</body>

</html>