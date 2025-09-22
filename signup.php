<?php
include 'includes/config.php';

if (isset($_POST['user_register_btn'])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['user_register_frist_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['user_register_last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['user_login_email']);
    $password = mysqli_real_escape_string($conn, $_POST['user_login_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['user_register_password-confirm']);
    $agree = isset($_POST['user_register_agree']) ? 1 : 0;

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit();
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    if (!$agree) {
        echo "<script>alert('You must agree to the terms and conditions!'); window.history.back();</script>";
        exit();
    }

    $check_email = mysqli_query($conn, "SELECT id FROM login WHERE user_login_email = '$email'");
    if (mysqli_num_rows($check_email) > 0) {
        // echo "<script>alert('Email already registered! Please login.'); window.location='index.php';</script>";
         header("Location: login.php");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO login (user_register_frist_name, user_register_last_name, user_login_email, user_login_password, role, created_at) 
        VALUES ('$first_name', '$last_name', '$email', '$hashed_password', 'job_seeker', NOW())";


    if (mysqli_query($conn, $sql)) {
        // echo "<script>alert('Registration successful! Please login now.'); window.location='index.php';</script>";
        header("Location: login.php");
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
}
?>