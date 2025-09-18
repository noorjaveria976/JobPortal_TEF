<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT status FROM companies WHERE id=$id");
    if($res->num_rows>0){
        $row = $res->fetch_assoc();
        $new_status = ($row['status']=='Active') ? 'Inactive' : 'Active';
        $conn->query("UPDATE companies SET status='$new_status' WHERE id=$id");
        $_SESSION['success'] = "Company status updated to $new_status!";
    }
    header("Location: ../manageCompany.php");
    exit;
}
?>
