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

   
</head>
<body>


   
    
    <div class="cards-container container-fluid mt-5">
        <div class="card text-white bg-success mb-3 float-left mr-3" style="max-width: 18rem; margin-left: 10%">
            <div class="card-header"></div>
            <div class="card-body">
            <?php  
                $con = mysqli_connect("localhost","root","","crud");
                $query = "SELECT COUNT(id) FROM users";  
                $query_run = mysqli_query($con, $query);
                $result = mysqli_fetch_array($query_run);                                 
            ?>
                <h5 class="card-title"><?= $result[0] ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card text-white bg-success mb-3 float-left mr-3" style="max-width: 18rem;">
            <div class="card-header"></div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Rumble is an online video platform, web hosting and cloud services business headquartered in Toronto, Ontario.</p>
            </div>
        </div>
        <div class="card text-white bg-success mb-3 float-left mr-3" style="max-width: 18rem;">
            <div class="card-header"></div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">It was founded in 2013 by Chris Pavlovski, a Canadian technology entrepreneur.</p>
            </div>
        </div>
        <div class="card text-white bg-success mb-3 float-left" style="max-width: 18rem;">
            <div class="card-header"></div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"> Rumble's cloud services business hosts Truth Social.Rumble has been described as "alt-tech".</p>
            </div>
        </div>
    </div>
</body>
</html>