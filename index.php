<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Job Portal Landing</title>
  <link rel="stylesheet" href="assets/css/app.min.css">
  <style>
    body {font-family: Arial, sans-serif;}
    .hero {background:#007bff; color:#fff; padding:80px 20px; text-align:center;}
  </style>
</head>
<body>
  <div class="hero">
    <h1>Welcome to Job Portal</h1>
    <p>Find your dream job or hire top talent</p>
    <button class="btn btn-light" data-toggle="modal" data-target="#roleModal">Go to Dashboard</button>

    <!-- Modal for role selection -->
    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Select Your Role</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body text-center mt-3">
            <a href="login.php?role=jobprovider" class="btn btn-primary btn-lg m-2">Login as Job Provider</a>
            <a href="login.php?role=jobseeker" class="btn btn-success btn-lg m-2">Login as Job Seeker</a>
            <a href="login.php?role=admin" class="btn btn-dark btn-lg m-2">Login as Admin</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/app.min.js"></script>
</body>
</html>