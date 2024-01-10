<?php
include("auth_session.php");
include("header.php");
require 'dbcon.php';


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">

<?php include('message.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>News Edit 
                    <a href="news.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">

                <?php
                if(isset($_GET['id']))
                {
                    $news_id = mysqli_real_escape_string($con, $_GET['id']);
                    $query = "SELECT * FROM news WHERE id='$news_id' ";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $news = mysqli_fetch_array($query_run);
                        ?>
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="news_id" value="<?= $news['id']; ?>">

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="<?=$news['title'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Description</label>
                                <input type="text" name="description" value="<?=$news['description'];?>" class="form-control">
                            </div>
                           
                            <div class="mb-3">
                             <label for="image">Choose Image:</label>
                             <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>
                            <div class="mb-3 mt-3">
                                <button type="submit" name="update_newsCard" class="btn btn-success">
                                    Update News
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
            </div>
        </div>
    </div>
</div>
</div>