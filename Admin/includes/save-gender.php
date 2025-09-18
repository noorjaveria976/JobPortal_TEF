<?php
session_start();
include "../config/db.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $gender_name = $_POST['gender_name'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO genders (gender_name, status) VALUES (?, ?)");
    $stmt->bind_param("si", $gender_name, $status);
    $stmt->execute();

    $_SESSION['success'] = "Gender added successfully!";
    header("Location: ../Gender.php");
    exit;
}
