<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $query = $conn->query("SELECT status FROM marital_status WHERE id=$id");
    if($query->num_rows > 0){
        $row = $query->fetch_assoc();
        $new_status = $row['status'] ? 0 : 1;
        $conn->query("UPDATE marital_status SET status=$new_status WHERE id=$id");
        $_SESSION['success'] = "Marital status status changed successfully!";
    }
}

header("Location: ../MaritalStatus.php");
exit;
?>
