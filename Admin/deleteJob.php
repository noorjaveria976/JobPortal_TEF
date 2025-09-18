<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    $sql = "DELETE FROM jobs WHERE id=$id";
    if($conn->query($sql)){
        $_SESSION['success'] = "Job deleted successfully!";
    } else {
        $_SESSION['error'] = "Failed to delete job: ".$conn->error;
    }

    header("Location: manageJobs.php");
    exit;
}
?>
