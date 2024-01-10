<?php
include("auth_session.php");
require 'dbcon.php';
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $status = $_POST["status"];

    // File upload handling
    $targetDir = "images/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (optional)
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, now insert data into database or perform other actions as needed

            // Example: Insert data into the database
            $sql = "INSERT INTO news (title, description, image, status) VALUES ('$title', '$description', '$targetFile', '$status')";
            if ($con->query($sql) === TRUE) {
                echo '<div style="background-color: #d4edda; color: #155724; border-color: #c3e6cb; padding: 10px; margin: 10px 0; border: 1px solid; border-radius: 5px;">';
                echo "News added successfully.";
                echo '</div>';
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">


<?php include('message.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add News
                    <a href="news.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="news_upload.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control">
                    </div>                            
                    <div class="mb-3">
                     <label for="image">Choose Image:</label>
                     <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                 
                   
                    

                
                <select id="status" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>  
                <div class="mb-3 mt-3">
                        <button type="submit" name="save_news" class="btn btn-success">Save</button>
                    </div>               


                </form>
            </div>
        </div>
    </div>
</div>
</div>
