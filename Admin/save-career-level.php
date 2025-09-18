<?php
session_start();
include "config/db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $language = $_POST['language'];
    $career_level = $_POST['career_level'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO career_levels (language, career_level, status) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $language, $career_level, $status);
    $stmt->execute();

    $_SESSION['success'] = "Career Level added successfully!";
    header("Location: CareerLevel.php");
    exit;
}
?>
