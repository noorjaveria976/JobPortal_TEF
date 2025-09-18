<?php
include "../config/db.php";
$id = intval($_GET['id']);
$conn->query("DELETE FROM jobs WHERE id=$id");
header("Location: manageJobs.php");
exit;
?>
