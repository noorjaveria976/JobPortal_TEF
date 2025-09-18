<?php
session_start();
include "../config/db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM job_attributes WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $_SESSION['success'] = "Attribute deleted successfully!";
}

header("Location: ../manageJobAttribute.php");
exit;
?>
