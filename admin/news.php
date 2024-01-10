<?php
include("auth_session.php");
include("header.php");
require 'dbcon.php';


?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
<div class="mb-3 mt-3">
<a href="news_upload.php" class="btn btn-success">Add News</a>
 </div>  
<div class="cards-container">
    <?php
    $con = mysqli_connect("localhost","root","","crud");
    $query = "SELECT * FROM news";  
    $query_run = mysqli_query($con, $query);
    

    foreach($query_run as $newsCard)
    {
        ?>
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
    <td><img src="<?= $newsCard['image']; ?>" alt="images"></td>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $newsCard['title']?></h5>
        <p class="card-text"><?php echo $newsCard['description']?></p>
        <a href="news_edit.php?id=<?= $newsCard['id']; ?>" class="btn btn-success btn-sm">Edit</a>
        <form action="code.php" method="POST" class="d-inline">
            <button type="submit" name="delete_newsCard" value="<?=$newsCard['id'];?>" class="btn btn-danger btn-sm">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
        <?php
    }

    ?>

</div>
                      
