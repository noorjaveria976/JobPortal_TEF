<?php
session_start();
include "../config/db.php";

// Check admin
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($id <= 0){
    $_SESSION['error'] = "Invalid user ID!";
    header("Location: ../AdminUsers.php");
    exit();
}

// Check if user is admin and prevent deleting last admin
$res = $conn->query("SELECT role,status FROM system_users WHERE id=$id");
if($res && $res->num_rows == 1){
    $user = $res->fetch_assoc();
    if($user['role'] == "admin" && $user['status'] == "Active"){
        $res2 = $conn->query("SELECT COUNT(*) AS total FROM system_users WHERE role='admin' AND status='Active'");
        $total_admins = $res2->fetch_assoc()['total'];
        if($total_admins <= 1){
            $_SESSION['error'] = "Cannot delete last active admin!";
            header("Location: ../AdminUsers.php");
            exit();
        }
    }

    $stmt = $conn->prepare("DELETE FROM system_users WHERE id=?");
    $stmt->bind_param("i",$id);
    if($stmt->execute()){
        $_SESSION['success'] = "User deleted successfully!";
    }else{
        $_SESSION['error'] = "Failed to delete user!";
    }
    $stmt->close();
}

header("Location: ../AdminUsers.php");
exit();
?>
