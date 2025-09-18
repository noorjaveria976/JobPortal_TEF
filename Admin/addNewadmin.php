<?php
session_start();
include "config/db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role     = $_POST['role'];
    $status   = 'Active'; // default active

    // Check if email already exists
    $check_sql = "SELECT id FROM admin_users WHERE email='$email'";
    $check_result = mysqli_query($conn, $check_sql);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        $_SESSION['error'] = "This email is already registered!";
    } else {
        $sql = "INSERT INTO admin_users (name, email, password, role, status) 
                VALUES ('$name', '$email', '$password', '$role', '$status')";

        if (mysqli_query($conn, $sql)) {
            // ✅ Add session alert for Job Provider dashboard
            $_SESSION['new_active_admin'] = [
                'name' => $name,
                'email' => $email,
                'role' => $role
            ];
            $_SESSION['success'] = "Admin user added successfully!";
        } else {
            $_SESSION['error'] = "Error: " . mysqli_error($conn);
        }
    }
    header("Location: AdminUsers.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Add New Admin</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <?php include('includes/source.html'); ?>
</head>
<body class="bg-light">
<div id="app">
  <div class="main-wrapper main-wrapper-1">

    <?php include('includes/navbar.php'); ?>
    <?php include('includes/sidebar.html'); ?>

    <div class="main-content">
      <section class="section">
        <h4 class="mb-4">Add New Admin User</h4>

        <div class="card shadow-sm card-primary">
          <div class="card-body">
            <form method="POST" action="">
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
              </div>
     <div class="form-group">
              <label>Role</label>
              <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="jobseeker">Job Seeker</option>
                <option value="jobprovider">Job Provider</option>

              </select>
            </div>

              <button type="submit" name="submit" class="btn btn-primary">Add User</button>
              <a href="AdminUsers.php" class="btn btn-secondary">Back</a>
            </form>
          </div>
        </div>
      </section>
      <?php include('includes/footer.php'); ?>
    </div>
  </div>
</div>

<!-- Template & Custom -->
<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
