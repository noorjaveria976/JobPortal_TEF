<?php
session_start();
include "../config/db.php";

if(isset($_POST['submit'])){
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $grade_name = mysqli_real_escape_string($conn, $_POST['grade_name']);
    $min_percent = intval($_POST['min_percent']);
    $max_percent = intval($_POST['max_percent']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = intval($_POST['status']);

    if($id){
        $conn->query("UPDATE result_grades SET grade_name='$grade_name', min_percent=$min_percent, max_percent=$max_percent, description='$description', status=$status WHERE id=$id");
        $_SESSION['success'] = "Result grade updated successfully!";
    }else{
        $conn->query("INSERT INTO result_grades (grade_name, min_percent, max_percent, description, status) VALUES ('$grade_name',$min_percent,$max_percent,'$description',$status)");
        $_SESSION['success'] = "Result grade added successfully!";
    }

    header("Location: ../ResultGrade.php");
    exit;
}
