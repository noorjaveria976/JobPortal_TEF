<?php
session_start();
include "../config/db.php";

if(isset($_POST['job_title'], $_POST['industry'], $_POST['status'])){
    $id        = intval($_POST['id']);
    $job_title = $conn->real_escape_string($_POST['job_title']);
    $industry  = $conn->real_escape_string($_POST['industry']);
    $status    = intval($_POST['status']);

    if($id > 0){
        $stmt = $conn->prepare("UPDATE job_titles SET job_title=?, industry=?, status=? WHERE id=?");
        $stmt->bind_param("ssii",$job_title,$industry,$status,$id);
        $stmt->execute();
        $_SESSION['success']="Job title updated successfully!";
    } else {
        $stmt = $conn->prepare("INSERT INTO job_titles (job_title, industry, status) VALUES (?,?,?)");
        $stmt->bind_param("ssi",$job_title,$industry,$status);
        $stmt->execute();
        $_SESSION['success']="Job title added successfully!";
    }
}

header("Location: ../JobTitle.php");
exit;
