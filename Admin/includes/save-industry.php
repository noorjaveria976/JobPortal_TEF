<?php
session_start();
include "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $industry_name = mysqli_real_escape_string($conn, $_POST['industry_name']);
    $industry_desc = mysqli_real_escape_string($conn, $_POST['industry_desc']);
    $status = intval($_POST['status']);

    if ($id > 0) {
        // Update
        $stmt = $conn->prepare("UPDATE industries SET industry_name=?, industry_desc=?, status=? WHERE id=?");
        $stmt->bind_param("ssii", $industry_name, $industry_desc, $status, $id);
        if ($stmt->execute()) {
            $_SESSION['success'] = "Industry updated successfully!";
        }
    } else {
        // Insert
        $stmt = $conn->prepare("INSERT INTO industries (industry_name, industry_desc, status) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $industry_name, $industry_desc, $status);
        if ($stmt->execute()) {
            $_SESSION['success'] = "New industry added successfully!";
        }
    }
    header("Location: ../Industry.php");
    exit;
}
?>
