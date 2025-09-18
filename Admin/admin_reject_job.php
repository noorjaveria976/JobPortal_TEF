<?php
session_start();
include "../config/db.php";
include "../config/auth.php";
check_login();
if (!is_admin()) { header("Location: ../login.php"); exit(); }

$job_id = intval($_GET['job_id']);
$nid = intval($_GET['nid']);

// Reject job
$conn->query("UPDATE notifications SET status='rejected' WHERE id=$nid");
$conn->query("DELETE FROM jobs WHERE id=$job_id");

$_SESSION['success'] = "Job rejected successfully!";
header("Location: dashboard.php");
exit();
?>
