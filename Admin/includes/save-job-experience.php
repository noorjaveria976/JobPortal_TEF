<?php
session_start();
include "../config/db.php";

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$experience_title = mysqli_real_escape_string($conn, $_POST['experience_title']);
$experience_desc  = mysqli_real_escape_string($conn, $_POST['experience_desc']);
$status = isset($_POST['status']) ? intval($_POST['status']) : 1;

if($id > 0){
    $stmt = $conn->prepare("UPDATE job_experience SET experience_title=?, experience_desc=?, status=? WHERE id=?");
    $stmt->bind_param("ssii",$experience_title,$experience_desc,$status,$id);
    $stmt->execute();
    $_SESSION['success']="Job Experience updated successfully!";
}else{
    $stmt = $conn->prepare("INSERT INTO job_experience (experience_title, experience_desc, status) VALUES (?,?,?)");
    $stmt->bind_param("ssi",$experience_title,$experience_desc,$status);
    $stmt->execute();
    $_SESSION['success']="Job Experience added successfully!";
}

header("Location: ../JobExperience.php");
exit;
