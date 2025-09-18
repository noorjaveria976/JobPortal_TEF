<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM job_types WHERE id=$id");
    $_SESSION['success']="Job Type deleted successfully";
}
header("Location: ../JobsTypes.php");
exit;
?>
