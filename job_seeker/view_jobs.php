<?php
session_start();
include 'include/config.php';

// Dummy session user_id (apke login system se user id aayegi)
$user_id = $_SESSION['user_id'] ?? 1;

// Apply button form submit handle
if (isset($_POST['apply_job'])) {
    $job_id = intval($_GET['id']);

    // Check if already applied
    $check = "SELECT * FROM job_seeker_appliedjobs WHERE user_id = $user_id AND job_id = $job_id LIMIT 1";
    $check_result = mysqli_query($conn, $check);

    if (mysqli_num_rows($check_result) > 0) {
        $msg = "<p class='text-warning'>⚠️ You have already applied for this job.</p>";
    } else {
        $apply = "INSERT INTO job_seeker_appliedjobs (user_id, job_id, applied_at) 
                  VALUES ($user_id, $job_id, NOW())";
        if (mysqli_query($conn, $apply)) {
            $msg = "<p class='text-success'>✅ Application submitted successfully!</p>";
        } else {
            $msg = "<p class='text-danger'>❌ Error: " . mysqli_error($conn) . "</p>";
        }
    }
}

// Get job id from URL
if (isset($_GET['id'])) {
    $job_id = intval($_GET['id']);

    $sql = "SELECT * FROM jobs WHERE id = $job_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $job = mysqli_fetch_assoc($result);

    if (!$job) {
        echo "<p class='text-danger'>Job not found.</p>";
        exit;
    }
} else {
    echo "<p class='text-danger'>No Job ID provided.</p>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>TEF - Admin Dashboard Template</title>
    <?php include('include/source.html'); ?>
    <style>
        .date-box {
            background-color: #3498db;
            color: white;
            text-align: center;
            padding: 5px;
            border-radius: 5px;
            width: 60px;
            font-size: 14px;
        }

        .date-box strong {
            font-size: 18px;
            display: block;
        }

        .job-logo {
            width: 70px;
            height: auto;
            border-radius: 5px;
        }

        .left-col {
            background-color: #f8f9fa;
            border-right: 2px solid #e9ecef;
            padding: 15px;
        }

        .section-title {
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        /* Remove borders from all rows except section headings */
        .custom-table td,
        .custom-table th {
            border-bottom: none !important;
        }

        /* Keep bottom border for heading rows */
        .custom-table thead th,
        .custom-table .section-heading th {
            border-bottom: 1px solid #dee2e6 !important;
        }

        .tag {
            background-color: #5bc0de;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
            margin: 3px 3px 3px 0;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!-- topbar start -->
            <?php include('include/topbar.php'); ?>
            <!-- topbar end -->
            <!-- sidebar start -->
            <?php include('include/sidebar.html'); ?>
            <!-- sidebar end -->
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <!-- add content here -->
                        <div class="container-fluid py-4">


                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-md-4 left-col">
                                            <table class="table custom-table">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2" class="text-info">Job Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Company:</th>
                                                        <td><?= $job['company_name'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country:</th>
                                                        <td><?= $job['country_id'] ?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                           <th>State:</th>
                                                           <td><?= $job['state_id'] ?></td>
                                                       </tr> -->
                                                    <tr>
                                                        <th>City:</th>
                                                        <td><?= $job['city_id'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Positions:</th>
                                                        <td><?= $job['num_of_positions'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Career Level:</th>
                                                        <td><?= $job['career_level_id'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Functional Area:</th>
                                                        <td><?= $job['functional_area_id'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Job Type:</th>
                                                        <td><?= $job['job_type_id'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Job Shift:</th>
                                                        <td><?= $job['job_shift_id'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Experience:</th>
                                                        <td><?= $job['job_experience_id'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender:</th>
                                                        <td><?= $job['gender_id'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Expiry Date:</th>
                                                        <td><?= date("d-m-Y", strtotime($job['expiry_date'])) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Salary:</th>
                                                        <td>
                                                            <?php if ($job['hide_salary'] == 1): ?>
                                                                Hidden
                                                            <?php else: ?>
                                                                <?= $job['salary_from'] ?> - <?= $job['salary_to'] ?> <?= $job['salary_currency'] ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-8">
                                            <a href="apply_jobs.php" class="btn btn-success btn-sm mb-3">
                                                <i class="fas fa-arrow-left"></i> Back to Listings
                                            </a>

                                            <div class="d-flex align-items-center mb-3">
                                                <img src="./assets/img/logo tef.png" alt="Logo" class="job-logo me-3">
                                                <div class="date-box me-3">
                                                    <strong><?= date("d", strtotime($job['created_at'] ?? $job['expiry_date'])) ?></strong>
                                                    <?= date("M", strtotime($job['created_at'] ?? $job['expiry_date'])) ?>
                                                </div>
                                                <div>
                                                    <h5 class="mb-0"><?= $job['title'] ?></h5>
                                                    <small class="text-muted"><?= $job['company_name'] ?>, <?= $job['city_id'] ?></small>
                                                </div>
                                            </div>

                                            <h6 class="section-title text-danger">Job Description</h6>
                                            <p><?= nl2br($job['description']) ?></p>

                                            <h6 class="section-title text-danger">Benefits</h6>
                                            <p><?= nl2br($job['benefits']) ?></p>

                                            <h6 class="section-title text-danger mt-3">Degree Level</h6>
                                            <span class="tag"><?= $job['degree_level_id'] ?></span>

                                            <div class="mt-4">
                                                <?php if (!empty($msg)) echo $msg; ?>

                                                <?php if ($job['external_job'] == 1 && !empty($job['job_link'])): ?>
                                                    <a href="<?= $job['job_link'] ?>" target="_blank" class="btn btn-success me-2">
                                                        <i class="fas fa-external-link-alt"></i> Apply for this Job
                                                    </a>
                                                <?php else: ?>
                                                    <form method="POST">
                                                        <button type="submit" name="apply_job" class="btn btn-primary">
                                                            <i class="fas fa-paper-plane"></i> Apply for this job
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </section>
                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <?php include('include/footer.html'); ?>
            <!-- footer end -->
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

</html>