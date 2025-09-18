<?php
session_start();
include "config/db.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    if(!empty($_POST['id'])){ // Update
        $id = intval($_POST['id']);
        $stmt = $conn->prepare("UPDATE faqs SET question=?, answer=?, last_updated=NOW() WHERE id=?");
        if(!$stmt) die("Prepare failed: ".$conn->error);
        $stmt->bind_param("ssi",$question,$answer,$id);
        $stmt->execute();
        $_SESSION['success'] = "FAQ updated successfully!";
    } else { // Insert
        $stmt = $conn->prepare("INSERT INTO faqs(question, answer, last_updated) VALUES(?,?,NOW())");
        if(!$stmt) die("Prepare failed: ".$conn->error);
        $stmt->bind_param("ss",$question,$answer);
        $stmt->execute();
        $_SESSION['success'] = "FAQ added successfully!";
    }

    header("Location: FAQ_table.php");
    exit;
}
