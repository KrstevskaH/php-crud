<?php
include("auth_session.php");
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
</head>

<body>

    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Details</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Email</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "crud");
                                $query = "SELECT * FROM `users` WHERE username='" . $_SESSION['username'] . "'";
                                $query_run = mysqli_query($con, $query);
                                $result = mysqli_fetch_array($query_run);
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $result[0] ?>
                                    </td>
                                    <th>
                                        <?php echo $result[1] ?>
                                    </th>
                                    <th>
                                    <?php echo $result[2] ?>
                                    </th>
                                </tr>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>