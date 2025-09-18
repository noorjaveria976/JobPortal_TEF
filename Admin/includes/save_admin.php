<?php
session_start();
include "../config/db.php";

// Check if admin
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

// Add New User
if(isset($_POST['save_admin'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO system_users (name,email,password,role,status) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss",$name,$email,$password,$role,$status);

    if($stmt->execute()){
        $_SESSION['success'] = "User added successfully!";
    }else{
        $_SESSION['error'] = "Failed to add user!";
    }
    $stmt->close();
    header("Location: ../AdminUsers.php");
    exit();
}

// Update User
if(isset($_POST['update_admin'])){
    $id = intval($_POST['id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];
    $status = $_POST['status'];

    // Protect last admin from being inactivated
    if($role === "admin" && $status === "Inactive"){
        $res = $conn->query("SELECT COUNT(*) AS total FROM system_users WHERE role='admin' AND status='Active'");
        $total_active_admin = $res->fetch_assoc()['total'];
        if($total_active_admin <= 1){
            $_SESSION['error'] = "Cannot deactivate last active admin!";
            header("Location: ../AdminUsers.php");
            exit();
        }
    }

    $stmt = $conn->prepare("UPDATE system_users SET name=?, email=?, role=?, status=? WHERE id=?");
    $stmt->bind_param("ssssi",$name,$email,$role,$status,$id);

    if($stmt->execute()){
        $_SESSION['success'] = "User updated successfully!";
    }else{
        $_SESSION['error'] = "Failed to update user!";
    }
    $stmt->close();
    header("Location: ../AdminUsers.php");
    exit();
}
?>
