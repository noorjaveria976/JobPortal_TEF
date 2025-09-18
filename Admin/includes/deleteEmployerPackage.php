<?php
session_start();
include "../config/db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM employer_packages WHERE id=$id");
    $_SESSION['success'] = "Package deleted successfully!";
}

header("Location: ../ManageEmployerPackage.php");
exit;
