<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM degree_levels WHERE id=$id");
    $_SESSION['success'] = "Degree Level deleted successfully!";
}

header("Location: ../DegreeLevel.php");
exit;
?>
