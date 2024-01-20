<?php
include("auth_session.php");
include("header.php");
require 'dbcon.php';


if (isset($_SESSION['id'])) {
    $loggedInUserId = $_SESSION['id'];
    $loggedInUserName = $_SESSION['username'];

    // Now $loggedInUserName and $loggedInUserSurname contain the name and surname of the logged-in user
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

    
    <title>Student CRUD</title>
</head>

<body>

<div class="container mt-5">

<?php include('message.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>User Edit 
                    <a href="dashboard.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <?php
                if(isset($_SESSION['username']))
                {
                    $user_id = mysqli_real_escape_string($con, $_SESSION['username']);
                    $query = "SELECT * FROM users WHERE username='$user_id' ";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $student = mysqli_fetch_array($query_run);
                        ?>
                        
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?= $loggedInUserId['id']; ?>">

                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" value="<?=$_SESSION['username'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Password</label>
                                <input type="text" name="password" value="<?=$_SESSION['password'];?>" class="form-control">
                            </div>
                            <div class="mb-3 mt-3">
                                <button type="submit" name="update_user" class="btn btn-success">
                                    Update User
                                </button>
                            </div>

                        </form>
                        <?php
                    }
                    else
                    {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
                ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>