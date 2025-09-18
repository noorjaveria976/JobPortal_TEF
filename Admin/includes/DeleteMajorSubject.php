<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM major_subjects WHERE id=$id");
    $_SESSION['success'] = "Major Subject deleted successfully!";
}

header("Location: ../MajorSubjects.php");
exit;
?>
