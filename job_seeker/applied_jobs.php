<?php
session_start();
include 'include/config.php';

// Dummy session user_id (replace with actual login session)
$user_id = $_SESSION['user_id'] ?? 1;

// Fetch applied jobs (join with jobs table to get details)
$sql = "SELECT j.* 
        FROM job_seeker_appliedjobs aj
        INNER JOIN jobs j ON aj.job_id = j.id
        WHERE aj.user_id = $user_id
        ORDER BY aj.applied_at DESC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>TEF - Admin Dashboard Template</title>
    <?php include('include/source.html'); ?>
    
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
                       <div class="container my-4">
    <h3 class="mb-4">My Applied Jobs</h3>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($job = mysqli_fetch_assoc($result)): ?>
            <div class="card card-primary mb-3">
                <div class="card-body text-dark">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-8 col-sm-8 d-flex">
                            <!-- Job Image -->
                            <div class="jobimg border p-1 rounded me-3" style="width: 80px; height: 80px; overflow:hidden;">
                                <img src="./assets/img/logo tef.png" alt="<?= $job['company_name'] ?>" title="<?= $job['company_name'] ?>" class="img-fluid">
                            </div>
                            <!-- Job Info -->
                            <div class="jobinfo">
                                <h3 class="fs-5 mb-1">
                                    <a class="text-decoration-none text-dark" href="view_jobs.php?id=<?= $job['id'] ?>" title="<?= $job['title'] ?>">
                                        <?= $job['title'] ?>
                                    </a>
                                </h3>
                                <div class="companyName mb-1">
                                    <a class="text-decoration-none text-dark" href="view_jobs.php?id=<?= $job['id'] ?>" title="<?= $job['company_name'] ?>">
                                        <?= $job['company_name'] ?>
                                    </a>
                                </div>
                                <div class="location">
                                    <label class="fulltime bg-success border rounded-pill px-2 text-white" title="<?= $job['job_shift_id'] ?>">
                                        <?= $job['job_shift_id'] ?>
                                    </label>
                                    - <span><?= $job['city_id'] ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-4 col-sm-4 d-flex justify-content-end align-items-start">
                            <a href="view_jobs.php?id=<?= $job['id'] ?>" class="btn btn-outline-primary py-2 px-4 mt-3">
                                VIEW DETAILS
                            </a>
                        </div>
                    </div>

                    <!-- Job Short Description -->
                    <p class="mt-3 text-muted">
                        <?= substr(strip_tags($job['description']), 0, 150) ?>...
                    </p>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-muted">You have not applied to any jobs yet.</p>
    <?php endif; ?>
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