<?php
session_start();
include 'includes/config.php';

if (isset($_POST['user_login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['user_login_email']);
    $password = mysqli_real_escape_string($conn, $_POST['user_login_password']);

    $query = mysqli_query($conn, "SELECT * FROM login WHERE user_login_email = '$email'");
    if (mysqli_num_rows($query) == 1) {
        $user = mysqli_fetch_assoc($query);

        if (password_verify($password, $user['user_login_password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['user_register_frist_name'];
            $_SESSION['user_role'] = $user['role'];

            // Redirect according to role
            if ($user['role'] == 'job_seeker') {
                header("Location: ./job_seeker/dashboard.php");
            } elseif ($user['role'] == 'job_provider') {
                header("Location: job_provider/dashboard.php");
            } elseif ($user['role'] == 'job_admin') {
                header("Location: ./job_admin/dashboard.php");
            } else {
                echo "<script>alert('Invalid role!');</script>";
            }
            exit();
        } else {
            echo "<script>alert('Invalid Password!');</script>";
        }
    } else {
        echo "<script>alert('Email not found!');</script>";
    }
}

?>