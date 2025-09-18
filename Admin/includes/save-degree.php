<?php
session_start();
include "../config/db.php";

if(isset($_POST['submit'])){
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $degree_name = mysqli_real_escape_string($conn, $_POST['degree_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = intval($_POST['status']);

    if($id){
        $conn->query("UPDATE degree_levels SET degree_name='$degree_name', description='$description', status=$status WHERE id=$id");
        $_SESSION['success'] = "Degree Level updated successfully!";
    } else {
        $conn->query("INSERT INTO degree_levels (degree_name, description, status) VALUES ('$degree_name', '$description', $status)");
        $_SESSION['success'] = "Degree Level added successfully!";
    }

    header("Location: ../DegreeLevel.php");
    exit;
}
?>
