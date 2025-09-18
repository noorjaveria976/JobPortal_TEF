<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM job_experience WHERE id=$id");
    $_SESSION['success']="Job Experience deleted successfully!";
}

header("Location: ../JobExperience.php");
exit;
