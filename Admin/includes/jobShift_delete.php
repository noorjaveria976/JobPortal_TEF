<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM job_shifts WHERE id=$id");
    $_SESSION['success'] = "Job Shift deleted successfully!";
}

header("Location: ../JobShift.php");
exit;
