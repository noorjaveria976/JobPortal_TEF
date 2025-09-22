<?php
session_start();
include "config/db.php";

// role select from landing
if (isset($_GET['role']) && in_array($_GET['role'], ['admin','jobseeker','jobprovider'])) {
    $_SESSION['selected_role'] = $_GET['role'];
}
if (!isset($_SESSION['selected_role'])) {
    header("Location: index.php"); exit();
}
$selected_role = $_SESSION['selected_role'];

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM system_users WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res && $res->num_rows === 1) {
        $user = $res->fetch_assoc();

        if ($user['status'] !== 'Active') {
            $error = "Account not active.";
        } elseif ($user['role'] !== $selected_role) {
            $error = "Selected role does not match your account role.";
        } elseif (!password_verify($password, $user['password'])) {
            $error = "Invalid password.";
        } else {
            session_regenerate_id(true);
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['status'] = $user['status'];

            unset($_SESSION['selected_role']);

            // ✅ Redirects
            if ($user['role'] === 'admin') {
                header("Location: Admin/dashboard.php");
            } elseif ($user['role'] === 'jobseeker') {
                header("Location: job_seeker/login.php");
            } elseif ($user['role'] === 'jobprovider') {
                header("Location: job_provider/dashboard.php");
                exit();
            } else {
                $error = "Unknown role.";
            }
        }
    } else {
        $error = "User not found.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          

            <div class="card card-primary">
              <div class="card-header">
                <h4>Login as <?php echo ucfirst($selected_role); ?></h4>
              </div>

              <div class="card-body">
                <?php if ($error): ?>
                  <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="POST" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" required autofocus>
                    <div class="invalid-feedback">Please fill in your email</div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="forgot.php" class="text-small">Forgot Password?</a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" required>
                    <div class="invalid-feedback">Please fill in your password</div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">
                      Login
                    </button>
                  </div>
                </form>

                <p style="font-size:0.9em;color:#666;text-align:center;">
                  You are logging in as <strong><?php echo htmlspecialchars($selected_role); ?></strong>.  
                  <a href="index.php">Change Role</a>
                </p>
              </div>
            </div>

            <div class="simple-footer">
              &copy; Job Portal <?= date('Y'); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="assets/js/app.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>