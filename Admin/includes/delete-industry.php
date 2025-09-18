<?php
session_start();
include "../config/db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM industries WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $_SESSION['success'] = "Industry deleted successfully!";
    }
}

header("Location: ../Industry.php");
exit;
?>
