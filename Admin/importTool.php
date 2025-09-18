<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Import All Jobs</title>
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <?php include('includes/source.html'); ?>
</head>
<body>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <?php include('includes/navbar.php'); ?>
    <?php include('includes/sidebar.html'); ?>
    <div class="main-content">
      <section class="section">
        <div class="card pb-3">
          <div class="card-header fw-bold">Import All Jobs</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                  <tr>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Posted Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $jobs = $conn->query("SELECT * FROM jobs ORDER BY id DESC");
                  while($job = $jobs->fetch_assoc()){
                    echo "<tr>
                      <td>{$job['title']}</td>
                      <td>{$job['company']}</td>
                      <td>{$job['city']}</td>
                      <td>{$job['department']}</td>
                      <td>{$job['status']}</td>
                      <td>{$job['created_at']}</td>
                    </tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="d-flex gap-2" style="margin-left: 20px; column-gap: 10px;">
            <button class="btn btn-success">Import All Jobs</button>
            <button class="btn btn-secondary">Cancel</button>
          </div>
        </div>
      </section>
      <?php include('includes/footer.php'); ?>
    </div>
  </div>
</div>
<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
