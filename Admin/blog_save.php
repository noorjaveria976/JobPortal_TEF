<?php
session_start();
include "config/db.php";

// Image upload function
function uploadImage($file) {
    $targetDir = "uploads/blogs/";
    if(!is_dir($targetDir)) mkdir($targetDir, 0777, true);
    $filename = time() . "_" . basename($file["name"]);
    $targetFile = $targetDir . $filename;
    if(move_uploaded_file($file["tmp_name"], $targetFile)) return $targetFile;
    return null;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'] ?? '';
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $blog_date = $_POST['blog_date'];

    $image = '';
    if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
        $image = uploadImage($_FILES['image']);
    }

    if($id){ // Update
        if($image){
            $sql = "UPDATE blogs SET title='$title', content='$content', image='$image', blog_date='$blog_date' WHERE id=$id";
        } else {
            $sql = "UPDATE blogs SET title='$title', content='$content', blog_date='$blog_date' WHERE id=$id";
        }
        $_SESSION['success'] = $conn->query($sql) ? "Blog updated successfully!" : "Error updating blog!";
    } else { // Insert
        $sql = "INSERT INTO blogs (title, content, image, blog_date) VALUES ('$title','$content','$image','$blog_date')";
        $_SESSION['success'] = $conn->query($sql) ? "Blog added successfully!" : "Error adding blog!";
    }

    header("Location: Blog_table.php");
    exit;
}
?>
