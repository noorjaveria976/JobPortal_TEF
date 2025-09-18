<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM genders WHERE id=$id");
    $_SESSION['success'] = "Gender deleted successfully!";
}

header("Location: ../Gender.php");
exit;
