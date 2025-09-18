<?php
include "../config/db.php";
$id = intval($_GET['id']);
$conn->query("UPDATE jobs SET status='inactive' WHERE id=$id");
header("Location: manageJobs.php");
exit;
?>
