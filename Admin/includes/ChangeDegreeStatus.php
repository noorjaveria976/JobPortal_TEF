<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $row = $conn->query("SELECT status FROM degree_levels WHERE id=$id")->fetch_assoc();
    $new_status = $row['status']==1 ? 0 : 1;
    $conn->query("UPDATE degree_levels SET status=$new_status WHERE id=$id");
    $_SESSION['success'] = "Status updated successfully!";
}

header("Location: ../DegreeLevel.php");
exit;
?>
