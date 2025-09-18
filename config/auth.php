<?php
// Do not start session here if already started in login/dashboard
if(session_status() === PHP_SESSION_NONE) session_start();
include "db.php";

function check_login() {
    if(!isset($_SESSION['id'])){  // <-- match the session key used in login
        header("Location: ../login.php");
        exit();
    }
}

function is_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function is_jobseeker() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'jobseeker';
}

function is_jobprovider() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'jobprovider';
}
?>
