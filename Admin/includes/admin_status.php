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

// Get current status
$res = $conn->query("SELECT role,status FROM system_users WHERE id=$id");
if($res && $res->num_rows == 1){
    $user = $res->fetch_assoc();
    $new_status = ($user['status'] === "Active") ? "Inactive" : "Active";

    // Protect last admin
    if($user['role'] === "admin" && $new_status === "Inactive"){
        $res2 = $conn->query("SELECT COUNT(*) AS total FROM system_users WHERE role='admin' AND status='Active'");
        $total_admins = $res2->fetch_assoc()['total'];
        if($total_admins <= 1){
            $_SESSION['error'] = "Cannot deactivate last active admin!";
            header("Location: ../AdminUsers.php");
            exit();
        }
    }

    $stmt = $conn->prepare("UPDATE system_users SET status=? WHERE id=?");
    $stmt->bind_param("si",$new_status,$id);
    if($stmt->execute()){
        $_SESSION['success'] = "User status updated!";
    }else{
        $_SESSION['error'] = "Failed to update status!";
    }
    $stmt->close();
}

header("Location: ../AdminUsers.php");
exit();
?>
