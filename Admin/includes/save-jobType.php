<?php
session_start();
include "../config/db.php";

// Check if form submitted
if(isset($_POST['submit'])){
    $job_type   = $conn->real_escape_string($_POST['job_type']);
    $description = $conn->real_escape_string($_POST['description']);
    $status     = intval($_POST['status']);

    // Check if editing
    if(isset($_POST['id']) && !empty($_POST['id'])){
        $id = intval($_POST['id']);
        $sql = "UPDATE job_types 
                SET job_type='$job_type', description='$description', status=$status 
                WHERE id=$id";
        $conn->query($sql);
        $_SESSION['success'] = "Job Type updated successfully!";
    } else {
        // Insert new record
        $sql = "INSERT INTO job_types (job_type, description, status) 
                VALUES ('$job_type', '$description', $status)";
        $conn->query($sql);
        $_SESSION['success'] = "Job Type added successfully!";
    }

    // Redirect back to list page
    header("Location: ../JobsTypes.php");
    exit;
}
?>
