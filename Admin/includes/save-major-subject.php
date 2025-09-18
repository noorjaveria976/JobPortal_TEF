<?php
session_start();
include "../config/db.php";

if(isset($_POST['submit'])){
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $subject_name = mysqli_real_escape_string($conn, $_POST['subject_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = intval($_POST['status']);

    if($id){
        $conn->query("UPDATE major_subjects SET subject_name='$subject_name', description='$description', status=$status WHERE id=$id");
        $_SESSION['success'] = "Major Subject updated successfully!";
    } else {
        $conn->query("INSERT INTO major_subjects (subject_name, description, status) VALUES ('$subject_name','$description',$status)");
        $_SESSION['success'] = "Major Subject added successfully!";
    }

    header("Location: ../MajorSubjects.php");
    exit;
}
?>
