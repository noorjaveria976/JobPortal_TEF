<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM career_levels WHERE id=$id");
    $_SESSION['success'] = "Career Level deleted successfully!";
}

header("Location: ../CareerLevel.php");
exit;
?>
