<?php
session_start();
include "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $package_name = $_POST['package_name'];
    $job_posts = $_POST['job_posts'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $highlight = isset($_POST['highlight']) ? 1 : 0;
    $urgent = isset($_POST['urgent']) ? 1 : 0;
    $support = isset($_POST['support']) ? 1 : 0;
    $status = $_POST['status'];

    if (!empty($_POST['id'])) {
        $id = intval($_POST['id']);
        $sql = "UPDATE employer_packages 
                SET package_name=?, job_posts=?, duration=?, price=?, 
                    highlight=?, urgent=?, support=?, status=? 
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisdiiisi", $package_name, $job_posts, $duration, $price,
                           $highlight, $urgent, $support, $status, $id);
        $stmt->execute();
        $_SESSION['success'] = "Package updated successfully!";
    } else {
        $sql = "INSERT INTO employer_packages 
                (package_name, job_posts, duration, price, highlight, urgent, support, status) 
                VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisdiiis", $package_name, $job_posts, $duration, $price,
                           $highlight, $urgent, $support, $status);
        $stmt->execute();
        $_SESSION['success'] = "Package added successfully!";
    }
}

header("Location: ../ManageEmployerPackage.php");
exit;
