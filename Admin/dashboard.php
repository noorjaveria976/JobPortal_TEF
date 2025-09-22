<?php
session_start();
include "../config/db.php";
// include "../config/auth.php"; // fixed path

// check_login();

// if (!is_admin()) {
//     header("Location: ../login.php");
//     exit();
// }

// Companies stats
$activeCount = $conn->query("SELECT COUNT(*) as active_count FROM companies WHERE status='Active'")->fetch_assoc()['active_count'] ?? 0;
$inactiveCount = $conn->query("SELECT COUNT(*) as inactive_count FROM companies WHERE status='Inactive'")->fetch_assoc()['inactive_count'] ?? 0;

// Jobs stats
$approved_jobs_res = $conn->query("SELECT COUNT(*) AS total FROM jobs WHERE status='Active'");
$total_jobs = $approved_jobs_res ? $approved_jobs_res->fetch_assoc()['total'] : 0;

// Admin Users stats
$active_users = $conn->query("SELECT COUNT(*) AS total FROM system_users WHERE status='Active' AND role='admin'")->fetch_assoc()['total'] ?? 0;
$inactive_users = $conn->query("SELECT COUNT(*) AS total FROM system_users WHERE status='Inactive' AND role='admin'")->fetch_assoc()['total'] ?? 0;
$count_admins = $conn->query("SELECT COUNT(*) AS total FROM system_users WHERE role='admin'")->fetch_assoc()['total'] ?? 0;

// Toast
$toast = "";
if (isset($_SESSION['login_success'])) {
    $msg = $_SESSION['login_success'];
    unset($_SESSION['login_success']);
    $toast = "<script>
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
    </script>";
}

// Recent jobs (exclude rejected)
$recent_jobs_res = $conn->query("SELECT * FROM jobs WHERE status != 'Rejected' ORDER BY created_at DESC LIMIT 5");

// Recent admin users
$recent_users_res = $conn->query("SELECT * FROM system_users WHERE role='admin' ORDER BY id DESC LIMIT 5");

// Pending job notifications
$pending_cnt = $conn->query("SELECT COUNT(*) as cnt FROM notifications WHERE type='job_post' AND status='pending'")->fetch_assoc()['cnt'] ?? 0;
$pending_list = $conn->query("
    SELECT n.id as nid, j.id as job_id, j.title, u.name as provider_name, n.created_at
    FROM notifications n
    JOIN jobs j ON j.id = n.job_id
    JOIN system_users u ON u.id = n.provider_id
    WHERE n.type='job_post' AND n.status='pending'
    ORDER BY n.created_at DESC
    LIMIT 6
");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include('includes/source.html'); ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <?php include "includes/navbar.php"; ?>


            <?php include('includes/sidebar.html'); ?>

            <div class="main-content">
                <section class="section">
                    <h4>Welcome, <?= htmlspecialchars($_SESSION['name']); ?> 👋</h4>

                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <div class="card l-bg-green">
                                <div class="card-statistic-3">
                                    <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                                    <div class="card-content">
                                        <h5 class="card-title">Total Admin Users</h5>
                                        <span><?= $count_admins ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card l-bg-cyan">
                                <div class="card-statistic-3">
                                    <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                                    <div class="card-content">
                                        <h5 class="card-title">Companies Status</h5>
                                        <span>Active: <?= $activeCount ?></span> / <span>Inactive: <?= $inactiveCount ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card l-bg-purple">
                                <div class="card-statistic-3">
                                    <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                                    <div class="card-content">
                                        <h5 class="card-title">Jobs Posted</h5>
                                        <span><?= $total_jobs ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <div class="card l-bg-orange">
                                <div class="card-statistic-3">
                                    <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                                    <div class="card-content">
                                        <h5 class="card-title">Active / Inactive Users</h5>
                                        <span><?= $active_users ?> Active / <?= $inactive_users ?> Inactive</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-lg-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-header bg-primary text-white"><i class="fas fa-briefcase me-2"></i> Recent Jobs</div>
                                <div class="card-body p-2">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Job Title</th>
                                                    <th>Company</th>
                                                    <th>Date</th>
                                                    <th>Job Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if ($recent_jobs_res && $recent_jobs_res->num_rows > 0) {
                                                    while ($job = $recent_jobs_res->fetch_assoc()) {
                                                        $company_name = !empty($job['company_name']) ? htmlspecialchars($job['company_name']) : 'N/A';
                                                        $job_title = htmlspecialchars($job['title']);
                                                        $created_date = date('d M', strtotime($job['created_at']));

                                                        if ($job['status'] == 'Active') {
                                                            $status_text = 'Approved';
                                                            $badge_class = 'success';
                                                        } elseif ($job['status'] == 'Inactive') {
                                                            $status_text = 'Pending';
                                                            $badge_class = 'warning';
                                                        } else {
                                                            $status_text = ucfirst($job['status']);
                                                            $badge_class = 'secondary';
                                                        }

                                                        echo "<tr>
            <td>{$i}</td>
            <td>{$job_title}</td>
            <td>{$company_name}</td>
            <td>{$created_date}</td>
            <td><span class='badge badge-{$badge_class}'>{$status_text}</span></td>
        </tr>";
                                                        $i++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='5' class='text-center'>No jobs posted yet</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                   <div class="col-lg-6">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white"><i class="fas fa-users me-2"></i> Recent Admin Users</div>
        <div class="card-body p-2">
            <div class="table-responsive">
                <table class="table table-striped" id="tableRecentUsers">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th> <!-- Added Status Column -->
                        </tr>
                    </thead>
                    <tbody>
<?php
$i = 1;
if ($recent_users_res && $recent_users_res->num_rows > 0) {
    while ($user = $recent_users_res->fetch_assoc()) {
        // Status Badge
        if ($user['status'] == 'Active') {
            $status_text = 'Active';
            $badge_class = 'success';
        } else {
            $status_text = 'Inactive';
            $badge_class = 'secondary';
        }

        echo "<tr>
            <td>{$i}</td>
            <td>" . htmlspecialchars($user['name']) . "</td>
            <td>" . htmlspecialchars($user['email']) . "</td>
            <td>" . htmlspecialchars($user['role']) . "</td>
            <td><span class='badge badge-{$badge_class}'>{$status_text}</span></td>
        </tr>";
        $i++;
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No users found</td></tr>";
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


                </section>
                <?php include('includes/footer.php'); ?>
            </div>
        </div>
    </div>

    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <?= $toast ?>
</body>

</html>