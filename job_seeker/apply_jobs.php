<?php
session_start();
include "include/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>TEF - Admin Dashboard Template</title>
  <?php include('include/source.html'); ?>
  <!-- Custom Style -->
  <link href="assets/css/main.css" rel="stylesheet">

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
            <?php
            // saari jobs fetch karo (latest first)
            $sql = "SELECT * FROM jobs WHERE status='active' ORDER BY created_at DESC";
            $result = mysqli_query($conn, $sql);
            ?>

            <div class="container my-4">
              <div class="row">
                <?php if (mysqli_num_rows($result) > 0): ?>
                  <?php while ($job = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-4 mb-4">
                      <div class="card card-success h-100 shadow-sm">
                        <div class="card-body">
                          <div class="jobint mt-0 mb-4 text-dark">

                            <!-- Job Type -->
                            <div class="d-flex">
                              <div class="fticon">
                                <i class="fas fa-briefcase bg-light p-2 border rounded-pill me-3"></i>
                                <?= htmlspecialchars($job['job_type_id']) ?>
                              </div>
                            </div>

                            <!-- Job Title -->
                            <h4 class="fs-5 mt-2">
                              <a class="text-decoration-none text-dark fs-4" href="viewjob.php?id=<?= $job['id'] ?>" title="<?= htmlspecialchars($job['title']) ?>">
                                <?= htmlspecialchars($job['title']) ?>
                              </a>
                            </h4>

                            <!-- Salary -->
                            <div class="salary mb-2">
                              Salary:
                              <strong>
                                <?php if ($job['hide_salary'] == 1): ?>
                                  Hidden
                                <?php else: ?>
                                  <?= htmlspecialchars($job['salary_currency']) ?><?= htmlspecialchars($job['salary_from']) ?> -
                                  <?= htmlspecialchars($job['salary_to']) ?>/<?= htmlspecialchars($job['salary_period_id']) ?>
                                <?php endif; ?>
                              </strong>
                            </div>

                            <!-- Location -->
                            <strong>
                              <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($job['city_id']) ?>
                            </strong>

                            <!-- Company Info -->
                            <div class="jobcompany d-flex  mt-3 justify-content-between align-items-center py-2 px-3 border rounded-4 border-0" style="background: #f3f3f3;">
                              <div class="ftjobcomp">
                                <span><?= date("M d, Y", strtotime($job['created_at'])) ?></span>
                                <a href="viewjob.php?id=<?= $job['id'] ?>" title="<?= htmlspecialchars($job['functional_area_id']) ?>">
                                  <?= htmlspecialchars($job['functional_area_id']) ?>
                                </a>
                              </div>
                              <a href="#" class="company-logo" title="<?= htmlspecialchars($job['company_name']) ?>">
                                <img src="./assets/img/logo tef.png" alt="<?= htmlspecialchars($job['company_name']) ?>" title="<?= htmlspecialchars($job['company_name']) ?>">
                              </a>
                            </div>

                            <!-- View Details Button -->
                            <a href="view_jobs.php?id=<?= $job['id'] ?>" class="btn btn-primary mt-3 w-75">
                              <i class="fas fa-eye"></i> View Details
                            </a>



                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endwhile; ?>
                <?php else: ?>
                  <p class="text-center">No jobs found.</p>
                <?php endif; ?>
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