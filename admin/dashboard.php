<?php
//include auth_session.php file on all user panel pages
 include("auth_session.php");
 include("header.php");
 

if (isset($_SESSION['id'])) {
    $loggedInUserId = $_SESSION['id'];
    $loggedInUserName = $_SESSION['username'];
    
    // Now $loggedInUserName and $loggedInUserSurname contain the name and surname of the logged-in user
} else {
    // User is not logged in, handle accordingly
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        .card-link {
            color: #222831; 
            text-decoration: none; 
        }

        .card-link:hover {
            color: #f2f2f2; 
        }
    </style>

   
</head>
<body>


   
    
   
        <div class="container">
  <?php include('message.php'); ?>
    <div class="row gy-3 mt-5">
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card">
          <div class="card-body bg-info">
          <h5 class="card-title">Students
          <?php  
                $con = mysqli_connect("localhost","root","","crud");
                $query = "SELECT COUNT(id) FROM students";  
                $query_run = mysqli_query($con, $query);
                $result = mysqli_fetch_array($query_run);                                 
            ?>
                <h5 class="card-title"><?= $result[0] ?></h5>
                <i class="fa fa-users fa-3x text-light"></i>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card">
          <div class="card-body bg-warning">
          <?php  
            $con = mysqli_connect("localhost","root","","crud");
            $query = "SELECT COUNT(id) FROM news";  
            $query_run = mysqli_query($con, $query);

            
            if ($query_run) {
                $result = mysqli_fetch_array($query_run);

                
                if ($result !== null && count($result) > 0) {
                    ?>
                    <a href="../home.php" class="card-link">
                        <h5 class="card-title">Total News <?= $result[0] ?></h5>
                    </a>
                    <?php
                } else {
                    echo "No active news found."; 
                }
            } else {
                
                echo "Error: " . mysqli_error($con);
            }
        ?>


          
          <i class="fa fa-newspaper-o fa-3x text-light"></i>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
    
        <div class="card">
                  
          <div class="card-body bg-danger">
          <a href="../home.php" class="card-link"> </h5></a>
          <?php  
            $con = mysqli_connect("localhost","root","","crud");
            $query = "SELECT COUNT(id) FROM news WHERE status = '1'";  
            $query_run = mysqli_query($con, $query);

            
            if ($query_run) {
                $result = mysqli_fetch_array($query_run);

                
                if ($result !== null && count($result) > 0) {
                    ?>
                    <a href="../home.php" class="card-link">
                        <h5 class="card-title">Active News <?= $result[0] ?></h5>
                    </a>
                    <?php
                } else {
                    echo "No active news found."; 
                }
            } else {
                
                echo "Error: " . mysqli_error($con);
            }
        ?>
            
          <i class="fa fa-newspaper-o fa-3x text-light"></i>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card">
          <div class="card-body bg-success">
          <?php  
            $con = mysqli_connect("localhost","root","","crud");
            $query = "SELECT COUNT(id) FROM news WHERE status = '0'";  
            $query_run = mysqli_query($con, $query);

            
            if ($query_run) {
                $result = mysqli_fetch_array($query_run);

                
                if ($result !== null && count($result) > 0) {
                    ?>
                    <a href="../home.php" class="card-link">
                        <h5 class="card-title">Inactive News <?= $result[0] ?></h5>
                    </a>
                    <?php
                } else {
                    echo "No active news found."; 
                }
            } else {
                
                echo "Error: " . mysqli_error($con);
            }
        ?>
          
          <i class="fa fa-newspaper-o fa-3x text-light"></i>
        </div>
      </div>
    </div>
  </div>
  </div>
    </div>
</body>
</html>