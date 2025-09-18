<?php
session_start();
include "../../config/db.php"; // config folder ka path

if(isset($_POST['update_job'])){
    $id = intval($_POST['id']);
    $title = $_POST['title'];
    $company_name = $_POST['company_name'];
    $salary_from = $_POST['salary_from'];
    $salary_to = $_POST['salary_to'];
    $currency = $_POST['salary_currency'];
    $job_type_id = $_POST['job_type_id'];
    $status = $_POST['status']; // Active / Inactive

    $stmt = $conn->prepare("UPDATE jobs SET title=?, company_name=?, salary_from=?, salary_to=?, salary_currency=?, job_type_id=?, status=? WHERE id=?");
    $stmt->bind_param("ssddsiii", $title, $company_name, $salary_from, $salary_to, $currency, $job_type_id, $status, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Redirect to manage_jobs.php to refresh page
    header("Location: ../manageJobs.php");
    exit;
}
?>
