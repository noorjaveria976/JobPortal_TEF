<?php
session_start();
include "../config/db.php";
include "../config/auth.php";

check_login();

// Role check: only job providers
if(!is_jobprovider()){ 
    header("Location: ../login.php");
    exit();
}

// Account status check
if ($_SESSION['status'] != 'Active') {
    $_SESSION['error'] = "Your account is inactive. Contact admin.";
    header("Location: ../login.php");
    exit();
}

// Toast notification
$toast = "";
if (isset($_SESSION['login_success'])) {
    $msg = $_SESSION['login_success'];
    unset($_SESSION['login_success']);
    $toast = "
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'success',
          title: '$msg',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true
        });
      });
    </script>
    ";
}

// Example stats (replace with dynamic DB queries if needed)
// $provider_id = $_SESSION['id'];
// $total_jobs = $conn->query("SELECT COUNT(*) AS total FROM jobs WHERE provider_id='$provider_id'")->fetch_assoc()['total'] ?? 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Job Provider Dashboard</title>
<?php include('includes/source.html'); ?>
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <?php include('includes/navbar.php'); ?>
    <?php include('includes/sidebar.html'); ?>

    <div class="main-content">
      <!-- Provider content start -->
      <section class="section">
        <h5>Welcome Job Provider, <?= htmlspecialchars($_SESSION['name']); ?></h5>

        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-purple">
                <i class="fas fa-briefcase"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <!-- <h3 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> <?= $total_jobs ?></h3> -->
                    <span class="text-muted">Open Jobs</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Add more stats cards here if needed -->
        </div>

        <!-- Purchased Job Package Details -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <h4>Purchased Job Package Details</h4>
              </div>
              <div class="card-body bg-light">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                    <thead class="bg-dark text-white">
                      <tr>
                        <th>Package Name</th>
                        <th>Price</th>
                        <th>Available quota</th>
                        <th>Purchased On</th>
                        <th>Package Expired</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="bg-white text-dark">
                        <td>Basic</td>
                        <td>USD10</td>
                        <td>10 / 21</td>
                        <td>2025-04-08 11:32:29</td>
                        <td>2026-11-28 19:00:00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

<!-- Third Row: Subscription Plans -->
<div class="row mt-4">
  <div class="col-12 col-md-4 col-lg-4">
    <div class="pricing">
      <div class="pricing-title">Developer Plan</div>
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>$29</div>
          <div>per month</div>
        </div>
        <div class="pricing-details">
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">1 Job Posting</div></div>
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">Basic Analytics</div></div>
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">1GB Storage</div></div>
          <div class="pricing-item"><div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i></div><div class="pricing-item-label">Premium Support</div></div>
          <div class="pricing-item"><div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i></div><div class="pricing-item-label">Custom Domain</div></div>
        </div>
      </div>
      <div class="pricing-cta"><a href="#">Subscribe <i class="fas fa-arrow-right"></i></a></div>
    </div>
  </div>

  <div class="col-12 col-md-4 col-lg-4">
    <div class="pricing pricing-highlight">
      <div class="pricing-title">Team Plan</div>
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>$99</div>
          <div>per month</div>
        </div>
        <div class="pricing-details">
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">5 Job Postings</div></div>
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">Advanced Analytics</div></div>
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">10GB Storage</div></div>
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">Custom Domain</div></div>
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">24/7 Support</div></div>
        </div>
      </div>
      <div class="pricing-cta"><a href="#">Subscribe <i class="fas fa-arrow-right"></i></a></div>
    </div>
  </div>

  <div class="col-12 col-md-4 col-lg-4">
    <div class="pricing">
      <div class="pricing-title">Enterprise Plan</div>
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>$499</div>
          <div>per month</div>
        </div>
        <div class="pricing-details">
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">Unlimited Job Postings</div></div>
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">Full Analytics</div></div>
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">100GB Storage</div></div>
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">Multiple Custom Domains</div></div>
          <div class="pricing-item"><div class="pricing-item-icon"><i class="fas fa-check"></i></div><div class="pricing-item-label">Lifetime Support</div></div>
        </div>
      </div>
      <div class="pricing-cta"><a href="#">Subscribe <i class="fas fa-arrow-right"></i></a></div>
    </div>
  </div>
</div>


        <!-- CV Packages Table -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between"><h4>Purchased CV Package Details</h4></div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" style="width:100%;">
                    <thead>
                      <tr>
                        <th>Package Name</th>
                        <th>Price</th>
                        <th>Available quota</th>
                        <th>Purchased On</th>
                        <th>Package Expired</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Basic</td>
                        <td>USD10</td>
                        <td>10 / 21</td>
                        <td>2025-04-08 11:32:29</td>
                        <td>2026-11-28 19:00:00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- Provider content end -->
    </div>

    <?php include('includes/footer.php'); ?>
  </div>
</div>

<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
<?= $toast ?>
</body>
</html>
