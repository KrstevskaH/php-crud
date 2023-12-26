<?php
//include auth_session.php file on all user panel pages
 include("auth_session.php");

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
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
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start ">
		<div class="navbar-nav">
			<a href="dashboard.php" class="nav-item nav-link active">Home</a>
			<a href="students.php" class="nav-item nav-link">Students</a>
			<div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
				<div class="dropdown-menu  font-weight-bold">
					<a href="#" class="dropdown-item">Free speech</a>
					<a href="#" class="dropdown-item">Content upload</a>
					<a href="#" class="dropdown-item">Monetization</a>
					<a href="#" class="dropdown-item">Marketing</a>
				</div>
			</div>
			<a href="#" class="nav-item nav-link">Blog</a>
			<a href="#" class="nav-item nav-link">Contact</a>
		</div>
		<form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search by Name">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form>
		<div class="navbar-nav ml-auto">
			<a href="#" class="nav-item nav-link notifications"><i class="fa fa-bell-o"></i><span class="badge">1</span></a>
			<a href="#" class="nav-item nav-link messages"><i class="fa fa-envelope-o"></i><span class="badge">10</span></a></a>
			<div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img src="../images/signal-2023-09-09-162014_002.jpeg" class="avatar" alt="Avatar"> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="profile.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
					<a href="#" class="dropdown-item"><i class="fa fa-calendar-o"></i> Calendar</a></a>
					<a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></a>
					<div class="dropdown-divider"></div>
					<a href="login.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
				</div>
			</div>
		</div>
	</div>
</nav>

   
    
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