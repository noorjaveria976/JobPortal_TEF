<?php
session_start();
// <?php
include "config/db.php";


if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error'] = "Invalid request!";
    header("Location: AdminUsers.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch user data
$sql = "SELECT * FROM admin_users WHERE id=$id";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
    $_SESSION['error'] = "User not found!";
    header("Location: AdminUsers.php");
    exit();
}
$user = mysqli_fetch_assoc($result);

// Update logic
if (isset($_POST['update'])) {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role  = $_POST['role'];

    // Prevent duplicate email (except current admin)
    $check_sql = "SELECT id FROM admin_users WHERE email='$email' AND id!=$id";
    $check_res = mysqli_query($conn, $check_sql);

    if ($check_res && mysqli_num_rows($check_res) > 0) {
        $_SESSION['error'] = "This email is already registered with another admin!";
    } else {
        $update_sql = "UPDATE admin_users SET name='$name', email='$email', role='$role' WHERE id=$id";
        if (mysqli_query($conn, $update_sql)) {
            $_SESSION['success'] = "Admin updated successfully!";
            header("Location: AdminUsers.php");
            exit();
        } else {
            $_SESSION['error'] = "Error updating admin: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Admin</title>
  <?php include('includes/source.html'); ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div id="app">
  <div class="main-wrapper main-wrapper-1">

    <!-- Navbar + Sidebar -->
    <?php include('includes/navbar.php'); ?>
    <?php include('includes/sidebar.html'); ?>

    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>Edit Admin</h1>
        </div>

        <?php
        if (isset($_SESSION['error'])) {
            echo "<script>Swal.fire('Error','" . $_SESSION['error'] . "','error');</script>";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "<script>Swal.fire('Success','" . $_SESSION['success'] . "','success');</script>";
            unset($_SESSION['success']);
        }
        ?>

        <div class="card shadow-sm card-primary">
          <div class="card-body">
            <form method="POST">
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" 
                       value="<?= htmlspecialchars($user['name']); ?>" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" 
                       value="<?= htmlspecialchars($user['email']); ?>" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-select form-control" required>
                  <option value="Admin" <?= $user['role']=="Admin"?"selected":""; ?>>Admin</option>
                  <option value="Super Admin" <?= $user['role']=="Super Admin"?"selected":""; ?>>Super Admin</option>
                  <option value="Editor" <?= $user['role']=="Editor"?"selected":""; ?>>Editor</option>
                </select>
              </div>

              <button type="submit" name="update" class="btn btn-primary">Update</button>
              <a href="AdminUsers.php" class="btn btn-secondary">Back</a>
            </form>
          </div>
        </div>
      </section>
    </div>

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>

  </div>
</div>

<!-- JS -->
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
