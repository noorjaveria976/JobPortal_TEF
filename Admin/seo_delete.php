<?php
session_start();
include "config/db.php";

// Check if ID is provided
if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM seo_pages WHERE id=?");
    if(!$stmt) {
        die("Prepare failed: ".$conn->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $_SESSION['success'] = "SEO page deleted successfully!";
} else {
    $_SESSION['success'] = "Invalid request!";
}

// Redirect back to table
header("Location: SEO_table.php");
exit;
