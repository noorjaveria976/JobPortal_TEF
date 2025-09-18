<?php
session_start();
include "../config/db.php";

if(isset($_POST['skill_name'], $_POST['category'], $_POST['status'])){
    $id = intval($_POST['id']);
    $skill_name = $conn->real_escape_string($_POST['skill_name']);
    $category   = $conn->real_escape_string($_POST['category']);
    $status     = intval($_POST['status']);

    if($id > 0){
        $stmt = $conn->prepare("UPDATE job_skills SET skill_name=?, category=?, status=? WHERE id=?");
        $stmt->bind_param("ssii", $skill_name, $category, $status, $id);
        $stmt->execute();
        $_SESSION['success'] = "Job skill updated successfully!";
    } else {
        $stmt = $conn->prepare("INSERT INTO job_skills (skill_name, category, status) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $skill_name, $category, $status);
        $stmt->execute();
        $_SESSION['success'] = "Job skill added successfully!";
    }
}

header("Location: ../JobSkills.php");
exit;
