<?php
session_start();
include "../config/db.php";
include "../config/auth.php";
check_login();
if (!is_admin()) { header("Location: ../login.php"); exit(); }

$job_id = intval($_GET['job_id']);
$nid = intval($_GET['nid']);

// Approve job
$conn->query("UPDATE jobs SET approved=1 WHERE id=$job_id");
$conn->query("UPDATE notifications SET status='approved' WHERE id=$nid");

$_SESSION['success'] = "Job approved successfully!";
header("Location: dashboard.php");
exit();
?>
