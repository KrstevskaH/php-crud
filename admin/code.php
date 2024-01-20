<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $image = htmlspecialchars(basename($_FILES["image"]["name"]));
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE students SET image='$image', name='$name', dob='$dob', email='$email', phone='$phone', course='$course' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $image = htmlspecialchars(basename($_FILES["image"]["name"]));
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT INTO students (image,name,dob,email,phone,course) VALUES ('$image','$name','$dob','$email','$phone','$course')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

if(isset($_POST['delete_newsCard']))
{
    $news_id = mysqli_real_escape_string($con, $_POST['delete_newsCard']);

    $query = "DELETE FROM news WHERE id='$news_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "News Card Deleted Successfully";
        header("Location: news.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "News Card Not Deleted";
        header("Location: news.php");
        exit(0);
    }
}

if(isset($_POST['update_newsCard']))
{
    $news_id = mysqli_real_escape_string($con, $_POST['news_id']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    // Check if a new image is being uploaded
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = basename($_FILES["image"]["name"]);

        // Specify the target directory for file upload
        $target_dir = "images/";
        $target_file = $target_dir . $image;

        // Move the uploaded file to the target directory
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Update the database with the new image path
            $query = "UPDATE news SET image='images/$image', title='$title', description='$description', status='$status' WHERE id='$news_id'";
        } else {
            // Handle file upload error
            $_SESSION['message'] = "Error uploading file.";
            header("Location: news.php");
            exit(0);
        }
    } else {
        // If no new image is uploaded, update other fields only
        $query = "UPDATE news SET title='$title', description='$description', status='$status' WHERE id='$news_id'";
    }

    // Execute the query
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "News Updated Successfully";
        header("Location: news.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "News Not Updated";
        header("Location: news.php");
        exit(0);
    }
}









if(isset($_POST['update_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);    
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    

    $query = "UPDATE users SET  username='$username', password='$password' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: dashboard.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Updated";
        header("Location: dashboard.php");
        exit(0);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "images/"; 
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Check if the file already exists
            if (file_exists($targetFile)) {
                echo "Sorry, the file already exists.";
            } else {
                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "Error uploading file.";
    }
}

?>