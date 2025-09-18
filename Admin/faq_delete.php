<?php
session_start();
include "config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM faqs WHERE id=?");
    if(!$stmt) die("Prepare failed: ".$conn->error);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $_SESSION['success'] = "FAQ deleted successfully!";
}

header("Location: FAQ_table.php");
exit;
