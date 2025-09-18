<?php
session_start();
include "../config/db.php";

if(isset($_POST['submit'])){
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $degree_type = mysqli_real_escape_string($conn, $_POST['degree_type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = intval($_POST['status']);

    if($id){
        $conn->query("UPDATE degree_types SET degree_type='$degree_type', description='$description', status=$status WHERE id=$id");
        $_SESSION['success'] = "Degree Type updated successfully!";
    } else {
        $conn->query("INSERT INTO degree_types (degree_type, description, status) VALUES ('$degree_type','$description',$status)");
        $_SESSION['success'] = "Degree Type added successfully!";
    }

    header("Location: ../DegreeTypes.php");
    exit;
}
?>
