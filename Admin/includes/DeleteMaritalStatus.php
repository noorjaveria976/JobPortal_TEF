<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM marital_status WHERE id=$id");
    $_SESSION['success'] = "Marital status deleted successfully!";
}

header("Location: ../MaritalStatus.php");
exit;
?>
