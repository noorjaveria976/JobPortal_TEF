<?php
session_start();
include "config/db.php";

// Check if ID is provided
if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    // First, get the blog to delete image if exists
    $res = $conn->query("SELECT * FROM blogs WHERE id=$id");
    if($res->num_rows > 0){
        $blog = $res->fetch_assoc();

        // Delete image file if exists
        if(!empty($blog['image']) && file_exists($blog['image'])){
            unlink($blog['image']);
        }

        // Delete blog record
        $del = $conn->query("DELETE FROM blogs WHERE id=$id");

        if($del){
            $_SESSION['success'] = "Blog deleted successfully!";
        } else {
            $_SESSION['success'] = "Error deleting blog!";
        }
    } else {
        $_SESSION['success'] = "Blog not found!";
    }
} else {
    $_SESSION['success'] = "Invalid request!";
}

// Redirect back to blog table
header("Location: Blog_table.php");
exit;
?>
