<?php
session_start(); // 🔹 Session start karna zaroori hai
include "../config/db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM jobs WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // 🔹 Success message set kar do
    $_SESSION['success'] = "Job deleted successfully!";
}

header("Location: ../manageJobs.php"); // 🔹 Redirect to ManageJobs.php
exit();
