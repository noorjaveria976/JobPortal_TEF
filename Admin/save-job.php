<?php
session_start();
include "config/db.php";

// Allow only logged-in providers
if (!isset($_SESSION['user_id'])) {
    die("⚠ Unauthorized access.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escape + sanitize inputs
    $title              = mysqli_real_escape_string($conn, $_POST['title']);
    $description        = mysqli_real_escape_string($conn, $_POST['description']);
    $benefits           = mysqli_real_escape_string($conn, $_POST['benefits']);
    $country_id         = (int)$_POST['country_id'];
    $state_id           = (int)$_POST['state_id'];
    $city_id            = (int)$_POST['city_id'];
    $salary_from        = (float)$_POST['salary_from'];
    $salary_to          = (float)$_POST['salary_to'];
    $salary_currency    = mysqli_real_escape_string($conn, $_POST['salary_currency']);
    $salary_period_id   = (int)$_POST['salary_period_id'];
    $hide_salary        = isset($_POST['hide_salary']) ? 1 : 0;
    $career_level_id    = (int)$_POST['career_level_id'];
    $functional_area_id = (int)$_POST['functional_area_id'];
    $job_type_id        = (int)$_POST['job_type_id'];
    $job_shift_id       = (int)$_POST['job_shift_id'];
    $num_of_positions   = (int)$_POST['num_of_positions'];
    $gender_id          = (int)$_POST['gender_id'];
    $expiry_date        = mysqli_real_escape_string($conn, $_POST['expiry_date']);
    $degree_level_id    = (int)$_POST['degree_level_id'];
    $job_experience_id  = (int)$_POST['job_experience_id'];
    $is_freelance       = isset($_POST['is_freelance']) ? 1 : 0;
    $external_job       = mysqli_real_escape_string($conn, $_POST['external_job']);
    $job_link           = mysqli_real_escape_string($conn, $_POST['job_link']);

    // Insert job
    $sql = "INSERT INTO jobs (
                title, description, benefits, country_id, state_id, city_id,
                salary_from, salary_to, salary_currency, salary_period_id, hide_salary,
                career_level_id, functional_area_id, job_type_id, job_shift_id, num_of_positions,
                gender_id, expiry_date, degree_level_id, job_experience_id, is_freelance, external_job, job_link
            ) VALUES (
                '$title','$description','$benefits','$country_id','$state_id','$city_id',
                '$salary_from','$salary_to','$salary_currency','$salary_period_id','$hide_salary',
                '$career_level_id','$functional_area_id','$job_type_id','$job_shift_id','$num_of_positions',
                '$gender_id','$expiry_date','$degree_level_id','$job_experience_id','$is_freelance','$external_job','$job_link'
            )";

    if ($conn->query($sql)) {
        $job_id = $conn->insert_id; 
        $provider_id = $_SESSION['user_id']; 

        // Insert notification (for Admin approval)
        $notify_sql = "INSERT INTO notifications (job_id, provider_id, type, status, created_at)
                       VALUES ('$job_id', '$provider_id', 'job_post', 'pending', NOW())";
        $conn->query($notify_sql);

        $_SESSION['success'] = "✅ Job posted successfully. Waiting for admin approval.";
        header("Location: manageJobs.php");
        exit;
    } else {
        $_SESSION['error'] = "❌ Error: " . $conn->error;
        header("Location: postJob.php");
        exit;
    }
}
?>
