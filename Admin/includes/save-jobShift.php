<?php
session_start();
include "../config/db.php";

if(isset($_POST['submit'])){
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $shift_name = mysqli_real_escape_string($conn, $_POST['shift_name']);
    $status = intval($_POST['status']);

    if($id){ // Update
        $sql = "UPDATE job_shifts SET shift_name='$shift_name', status=$status WHERE id=$id";
        $conn->query($sql);
        $_SESSION['success'] = "Job Shift updated successfully!";
    } else { // Insert
        $sql = "INSERT INTO job_shifts (shift_name, status) VALUES ('$shift_name', $status)";
        $conn->query($sql);
        $_SESSION['success'] = "Job Shift added successfully!";
    }

    header("Location: ../JobShift.php");
    exit;
}
