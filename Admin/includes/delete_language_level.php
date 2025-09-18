<?php
session_start();
include "../config/db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM language_levels WHERE id=$id");
    $_SESSION['success'] = "Language Level deleted successfully!";
}

header("Location: ../ListLanguageLevel.php");
exit;
