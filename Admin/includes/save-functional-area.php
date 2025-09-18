<?php
session_start();
include "../config/db.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $functional_area = $_POST['functional_area'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO functional_areas(functional_area, status) VALUES(?,?)");
    $stmt->bind_param("ss", $functional_area, $status);
    $stmt->execute();

    $_SESSION['success'] = "Functional Area added successfully!";
    header("Location: ../FunctionalAreas.php");
    exit;
}
?>
