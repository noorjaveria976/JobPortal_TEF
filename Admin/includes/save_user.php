<?php
session_start();
include "../config/db.php";

// Only Admin can add users
if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: ../login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));
    $role = $_POST['role'];
    $status = (int)$_POST['status'];
    $created_by = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO system_users (name,email,password,role,status,created_by) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("sssiii",$name,$email,$password,$role,$status,$created_by);

    if($stmt->execute()){
        $_SESSION['success'] = "User added successfully!";
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }
    $stmt->close();
    header("Location: ../Admin/AdminUsers.php");
    exit();
}
?>
