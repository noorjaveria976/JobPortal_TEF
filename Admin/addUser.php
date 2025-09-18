<?php
session_start();
include "../config/db.php";

// Sirf admin access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role  = $_POST['role'];

    $sql = "INSERT INTO users (name,email,password,role) 
            VALUES ('$name','$email','$password','$role')";
    if ($conn->query($sql)) {
        $_SESSION['success'] = "User created successfully!";
        header("Location: manageUsers.php");
        exit;
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add New User</title>
  <?php include "../includes/source.html"; ?>
</head>
<body>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.html"; ?>

<div class="main-content">
  <section class="section">
    <div class="section-body">
      <h4>Add New User</h4>
      <form method="POST">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Role</label>
          <select name="role" class="form-control" required>
            <option value="admin">Admin</option>
            <option value="jobprovider">Job Provider</option>
            <option value="seeker">Job Seeker</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
      </form>
    </div>
  </section>
</div>

<?php include "../includes/footer.php"; ?>
</body>
</html>
