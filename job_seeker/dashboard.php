<?php 
session_start();
include 'include/config.php';
?>
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>TEF - Admin Dashboard Template</title>
  <?php include('include/source.html'); ?>
  <style>
    .col-lg-2 {
      flex: 0 0 auto;
      width: 16.66666667%;
    }


    .usercoverphoto {

      position: relative;
      height: 300px;
      overflow: hidden;
      border-radius: 15px;
      background: #eee;
    }

    .profileban {
      position: relative;
      margin-top: -70px;
    }

    .abtuser {
      background: #f1f5ff;
      padding: 20px;
      border-radius: 15px;
      margin: 0 50px;
      margin-bottom: 30px;
    }

    .uavatar img {
      display: block;
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 5px;
    }

    .jobcompany .company-logo {
      display: block;
      flex-shrink: 0;
    }

    .jobcompany .company-logo img {
      border-radius: 50%;
      width: 60px;
      height: 60px;
      object-fit: contain;
      border: 2px solid #ffffff;
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
          <div class="pageSearch  pb-md-5">
            <form action="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs" method="get">
              <!-- Page Title start -->
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-7">
                    <h3 class="mt-0 text-center">Welcome to Your Candidate Dashboard</h3>
                    <div class="searchform p-2 border border-1 border-success bg-white" style="border-radius: 15px;">
                      <div class="input-group p-1 border-0 mysearch" style="font-size: 19px;">
                        <input type="text" name="search" id="jbsearch" value="" class="form-control ui-autocomplete-input p-4 border-0" placeholder="Enter Skills or job title">
                        <button type="submit" class="btn btn-primary text-white fs-3 px-3" style="border-radius: 8px;"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Page Title end -->
            </form>
          </div>




          <!-- cards section start -->
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-30">159</h5>
                          <h2 class="mb-3 font-15"><strong>Profile Views</strong></h2>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0">
                        <div class="card-content">
                          <h5 class="font-30"> 3</h5>
                          <h2 class="mb-1 font-15">Followers</h2>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-30">1 </h5>
                          <h2 class="mb-3 font-15">My CV List</h2>


                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">0</h5>
                          <h2 class="mb-3 font-18">Messages</h2>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- coverphoto -->
          <div class="row usercoverphoto">
            <div class="col-12 px-0">
              <img src="./assets/img/cover pic.jpg" class="w-100 d-block" alt="Job Seeker" title="Job Seeker">
              <a href="my_profile.php" class="text-decoration-none"><i class="fas fa-edit"></i></a>
            </div>
          </div>
          <!-- profile -->
          <div class="profileban">
            <div class="abtuser">
              <div class="row">
                <div class="col-lg-2 col-md-3">
                  <div class="uavatar"><img src="./assets/img/users/user-11.jpg" alt="Job Seeker" title="Job Seeker"></div>
                </div>
                <div class="col-lg-10 col-md-9">
                  <h4>Job Seeker</h4>
                  <ul class="userdata">
                    <li><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Bainbridge Island, Washington, United States of America</li>
                    <li><i class="fas fa-phone" aria-hidden="true"></i> +1234567890</li>
                    <li><i class="fas fa-envelope" aria-hidden="true"></i> seeker@jobsportal.com</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Applied jobs -->
          <div class="appliedjobswrap">
            <h3>My Applied Jobs</h3>
            <p>No applied jobs found.</p>
          </div>
          <!-- Recommended Jobs -->

          <div class="recommendedjobs">
            <h3>Recommended Jobs </h3>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-primary">
                  <div class="jobint p-3 ">

                    <!-- <span class="promotepof-badge"><i class="fa fa-bolt" title="This Match is Featured"></i></span> -->
                    <div class="d-flex">
                      <div class="fticon"><i class="fas fa-briefcase"></i> Full Time/Permanent</div>
                    </div>
                    <h4>
                      <a href="" class="text-decoration-none text-dark" title="UI/UX Designer">
                        UI/UX Designer
                      </a>
                    </h4>

                    <div class="salary mb-2">Salary:
                      <strong>$30000 - $90000/Monthly</strong>
                    </div>

                    <strong><i class="fas fa-map-marker-alt"></i> Islamabad</strong>
                    <div class="jobcompany d-flex mt-3 justify-content-between align-items-center p-3 bg-light" style="border-radius: 15px;">
                      <div class="ftjobcomp">
                        <div>Mar 07, 2025</div>
                        <a href="" class="text-decoration-none text-dark" title="Power Color">Power Color</a>
                      </div>
                      <a href="" class="company-logo" title="Power Color"><img src="./assets/img/power-color-1536854682-955.jpg" alt="Power Color" title="Power Color"></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-secondary">
                  <div class="jobint p-3 ">

                    <!-- <span class="promotepof-badge"><i class="fa fa-bolt" title="This Match is Featured"></i></span> -->
                    <div class="d-flex">
                      <div class="fticon"><i class="fas fa-briefcase"></i> Full Time/Permanent</div>
                    </div>
                    <h4>
                      <a href="" class="text-decoration-none text-dark" title="UI/UX Designer">
                        IOS Developer
                      </a>
                    </h4>

                    <div class="salary mb-2">Salary:
                      <strong>$30000 - $90000/Monthly</strong>
                    </div>

                    <strong><i class="fas fa-map-marker-alt"></i> Atlanta</strong>
                    <div class="jobcompany d-flex mt-3 justify-content-between align-items-center p-3 bg-light" style="border-radius: 15px;">
                      <div class="ftjobcomp">
                        <div>Mar 07, 2025</div>
                        <a href="" class="text-decoration-none text-dark" title="Power Color">Multimedia Design </a>
                      </div>
                      <a href="" class="company-logo" title="Power Color"><img src="./assets/img/power-color-1536854682-955.jpg" alt="Power Color" title="Power Color"></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-danger">
                  <div class="jobint p-3 ">

                    <!-- <span class="promotepof-badge"><i class="fa fa-bolt" title="This Match is Featured"></i></span> -->
                    <div class="d-flex">
                      <div class="fticon"><i class="fas fa-briefcase"></i> Full Time/Permanent</div>
                    </div>
                    <h4>
                      <a href="" class="text-decoration-none text-dark" title="UI/UX Designer">
                        Electrical Engineer
                      </a>
                    </h4>

                    <div class="salary mb-2">Salary:
                      <strong>$30000 - $90000/Monthly</strong>
                    </div>

                    <strong><i class="fas fa-map-marker-alt"></i> Aventura</strong>
                    <div class="jobcompany d-flex mt-3 justify-content-between align-items-center p-3 bg-light" style="border-radius: 15px;">
                      <div class="ftjobcomp">
                        <div>Mar 07, 2025</div>
                        <a href="" class="text-decoration-none text-dark" title="Power Color">Power Wave </a>
                      </div>
                      <a href="" class="company-logo" title="Power Color"><img src="./assets/img/power-color-1536854682-955.jpg" alt="Power Color" title="Power Color"></a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- Followings -->
          <div class="appliedjobswrap">
            <h3>My Followings</h3>
            <p>No Followings Found</p>
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
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>