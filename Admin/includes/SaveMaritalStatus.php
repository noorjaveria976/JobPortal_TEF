<?php
session_start();
include "../config/db.php";

if(isset($_POST['submit'])){
    $id = intval($_POST['id']);
    $status_name = mysqli_real_escape_string($conn, $_POST['status_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = intval($_POST['status']);

    if($id > 0){
        // Update
        $conn->query("UPDATE marital_status SET status_name='$status_name', description='$description', status=$status WHERE id=$id");
        $_SESSION['success'] = "Marital status updated successfully!";
    } else {
        // Insert
        $conn->query("INSERT INTO marital_status (status_name, description, status) VALUES ('$status_name','$description',$status)");
        $_SESSION['success'] = "Marital status added successfully!";
    }
    header("Location: ../MaritalStatus.php");
    exit;
}
?>
