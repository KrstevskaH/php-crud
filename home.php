<?php
require 'dbcon.php';


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM news WHERE status = '1'";
$query_run = mysqli_query($con, $query);


if (!$query_run) {
    die("Query failed: " . mysqli_error($con));
}


$activeNews = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-xl navbar-dark bg-success text-white font-weight-bold">
    <a href="#" class="navbar-brand"><i class="fa fa-play-circle"></i>Rumble</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link active">News</a>
        </div>
        <form class="navbar-form form-inline">
            <div class="input-group search-box">                                
                <input type="text" id="search" class="form-control" placeholder="Search by Name">
                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
            </div>
        </form>
    </div>
</nav>

<div class="container">
    <?php include('message.php'); ?>
    <div class="row gy-3 mt-5">
        <?php 
        
        if ($activeNews) {
            foreach ($activeNews as $news) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-body bg-success rounded-lg">
                           
                            <img src="<?= $news['image']; ?>" alt="News Image" class="card-img-top">
                            <h5 class="card-title"><?= $news['title']; ?></h5>
                            <p class="card-text"><?= $news['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        } else {
            echo '<div class="col-12">No active news available.</div>';
        }
        ?>
    </div>
</div>

</body>
</html>
