<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cache disable karna
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!isset($_SESSION['user_id']) || empty($_SESSION['role'])) {
    header("Location: ../index.php");
    exit();
}
?>
