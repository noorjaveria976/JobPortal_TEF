<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM result_grades WHERE id=$id");
    $_SESSION['success'] = "Result grade deleted successfully!";
}

header("Location: ../ResultGrade.php");
exit;
