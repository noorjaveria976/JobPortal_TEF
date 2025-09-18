<?php
session_start();
include "../config/db.php";

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$language = $_POST['language'];
$level = $_POST['level'];
$status = $_POST['status'];

if ($id > 0) {
    $stmt = $conn->prepare("UPDATE language_levels SET language_code=?, level=?, status=? WHERE id=?");
    $stmt->bind_param("ssii", $language, $level, $status, $id);
    $stmt->execute();
    $_SESSION['success'] = "Language Level updated successfully!";
} else {
    $stmt = $conn->prepare("INSERT INTO language_levels (language_code, level, status) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $language, $level, $status);
    $stmt->execute();
    $_SESSION['success'] = "Language Level added successfully!";
}

header("Location: ../ListLanguageLevel.php");
exit;
