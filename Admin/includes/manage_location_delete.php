<?php
session_start();
include "../config/db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete from manage_location
    $conn->query("DELETE FROM manage_location WHERE id=$id");

    // Delete from locations
    $conn->query("DELETE FROM locations WHERE id=$id");

    $_SESSION['success'] = "Location deleted successfully";
}

header("Location: ../manage_location.php");
exit;
?>
