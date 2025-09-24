<?php
session_start();
include "./job_seeker/include/config.php";
?>
<html lang="en" class="ltr" dir="ltr">

<head>
  <meta http-equiv="origin-trial" content="A7vZI3v+Gz7JfuRolKNM4Aff6zaGuT7X0mf3wtoZTnKv6497cVMnhy03KDqX7kBz/q/iidW7srW31oQbBt4VhgoAAACUeyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGUuY29tOjQ0MyIsImZlYXR1cmUiOiJEaXNhYmxlVGhpcmRQYXJ0eVN0b3JhZ2VQYXJ0aXRpb25pbmczIiwiZXhwaXJ5IjoxNzU3OTgwODAwLCJpc1N1YmRvbWFpbiI6dHJ1ZSwiaXNUaGlyZFBhcnR5Ijp0cnVlfQ==">

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>TEF - Admin Dashboard Template</title>

  <!-- <meta name="Description" content="Find best Jobs in United States of America, jobs listings and job opportunities on Jobs Portal. Browse more than 100K jobs in United States of America and apply for free! Jobs Portal is USA's leading job website where more than 52K top companies are posting jobs"> -->

  <!-- <meta name="Keywords" content="Jobs in USA, Jobs uae, Jobs, Careers, Recruitment, Employment, Hiring, Banking, CVs, Career, Finance, IT, Marketing, Online Jobs, Opportunity,usa, Resume, Work, naukri, rizq, Rozi"> -->

  <meta name="robots" content="ALL, FOLLOW,INDEX">
  <meta name="author" content="JobPortal.PK">

  <!-- Fav Icon -->
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />


  <!-- Owl carousel -->
  <link href="assets/css/owl.carousel.css" rel="stylesheet">

  <!-- bootstrap css cdn link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Custom Style -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    .hover-shadow:hover {
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15) !important;
      transform: translateY(-5px);
      cursor: pointer;
    }

    .transition {
      transition: all 0.2s ease-in-out;
    }
  </style>

</head>



<body>

  <!-- Header start -->
  <div class="header" id="siteheader">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 col-md-12 col-12"> <a href="#" class="d-flex align-item-center"><img src="./assets/img/logo-dark.png" alt="JOBS PORTAL" class=" w-75"></a>
          <div class="navbar-header navbar-light">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nav-main" aria-controls="nav-main" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i></button>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="col-lg-10 col-md-12 col-12">

          <!-- Nav start -->
          <nav class="navbar navbar-expand-lg navbar-light">

            <div class="navbar-collapse collapse" id="nav-main">
              <button class="close-toggler" type="button" data-toggle="offcanvas"> <span><i class="fas fa-times-circle" aria-hidden="true"></i></span> </button>

              <ul class="navbar-nav">
                <li class="nav-item active"><a href="#" class="nav-link">Home</a> </li>
                <li class="nav-item ">
                  <a href="" class="nav-link">Search Talent</a>
                </li>
                <li class="nav-item ">
                  <a href="" class="nav-link">Companies</a>
                </li>
                <li class="nav-item "><a href="" class="nav-link">Contact</a> </li>
                <li class="nav-item "><a href="faqs.php" class="nav-link">FAQ'S </a> </li>
                <li class="nav-item "><a href="login.php" class="nav-link">Login </a> </li>
                <!-- <li class="nav-item "><button class="btn btn-light" data-toggle="modal" data-target="#roleModal">Login</button> </li> -->
                <li class="nav-item register"><a href="auth-register.html" class="nav-link register">Register</a> </li>
                <li class="nav-item dropdown userbtn"><a href=""><img src="https://www.sharjeelanjum.com/demos/jobsportal-update/company_logos/multimedia-design-1614272292-782.jpg" alt="Multimedia Design" title="Multimedia Design"></a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a> </li>
                    <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> Company Profile</a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-desktop" aria-hidden="true"></i> Post Job</a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-envelope" aria-hidden="true"></i> Company Messages</a></li>
                    <li class="nav-item"><a href="logout.php" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a> </li>
                    <form id="logout-form-header1" action="logout" method="POST" style="display: none;">
                      <input type="hidden" name="_token" value="dWQSThWOrTMy01T95xVXyfir5JdgLkzNqN6fLUtu" autocomplete="off">
                    </form>
                  </ul>
                </li>

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

              </ul>

              <!-- Nav collapes end -->

            </div>
            <div class="clearfix"></div>
          </nav>

          <!-- Nav end -->

        </div>
      </div>

      <!-- row end -->

    </div>

    <!-- Header container end -->

  </div>

  <!-- Login -->
  <div class="modal fade mypremodal" id="headlogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="modal-body">
          <div class="preuserinfo">
            <h3>Login as</h3>
            <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/login" class="btn btn-yellow mt-3">Job Seeker</a>
            <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/company-login" class="btn btn-dark mt-3">Company</a>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!-- Register -->
  <div class="modal fade mypremodal" id="headregister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="modal-body">
          <div class="preuserinfo p-2 pb-4">
            <h3>Register as a</h3>
            <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/register" class="btn btn-yellow mt-3">Job Seeker</a>
            <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/company-register" class="btn btn-dark mt-3">Company</a>
          </div>
        </div>

      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade mypremodal" id="preresume" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="modal-body">
          <div class="preuserinfo">
            <h3>Login or register to create your Resume/CV</h3>
            <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/login" class="btn btn-yellow mt-3">Login</a>
            <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/register" class="btn btn-dark mt-3">Register</a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade mypremodal" id="prejobpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="modal-body">
          <div class="preuserinfo ps-0 pe-0">
            <h3>Welcome to Employer Portal</h3>
            <p>Earn our user's trust. Get your account approved to start posting jobs</p>
          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="mobilenav">
    <ul>
      <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update">
          <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 -960 960 960" width="36px" fill="#5f6368">
            <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"></path>
          </svg>
          <span>Home</span>
        </a></li>


      <li>
        <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/job-seekers">
          <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 -960 960 960" width="36px" fill="#5f6368">
            <path d="M160-120q-33 0-56.5-23.5T80-200v-440q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v440q0 33-23.5 56.5T800-120H160Zm0-80h640v-440H160v440Zm240-520h160v-80H400v80ZM160-200v-440 440Z"></path>
          </svg>
          <span>Talent</span>
        </a>
      </li>
      <li>
        <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/company-messages">
          <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 -960 960 960" width="36px" fill="#5f6368">
            <path d="M880-80 720-240H320q-33 0-56.5-23.5T240-320v-40h440q33 0 56.5-23.5T760-440v-280h40q33 0 56.5 23.5T880-640v560ZM160-473l47-47h393v-280H160v327ZM80-280v-520q0-33 23.5-56.5T160-880h440q33 0 56.5 23.5T680-800v280q0 33-23.5 56.5T600-440H240L80-280Zm80-240v-280 280Z"></path>
          </svg>
          <span>Messages</span>
        </a>
      </li>
      <li>
        <a href="javascript:void();" class="openmbnav">
          <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 -960 960 960" width="36px" fill="#5f6368">
            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"></path>
          </svg>
          <span>Dashboard</span>
        </a>
      </li>





    </ul>
  </div>
  <ul class="usernavdash" id="usermbnav">
    <li class="nav-item"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/company-home" class="nav-link"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a> </li>
    <li class="nav-item"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/company-profile" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> Company Profile</a></li>
    <li class="nav-item"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/post-job" class="nav-link"><i class="fa fa-desktop" aria-hidden="true"></i> Post Job</a></li>

    <li class="nav-item"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/posted-jobs" class="nav-link"><i class="fab fa-black-tie"></i> Manage Jobs</a></li>

    <li class="nav-item"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/company-packages" class="nav-link"><i class="fas fa-search" aria-hidden="true"></i> CV Search Packages</a></li>

    <li class="nav-item"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/list-payment-history" class="nav-link"><i class="fas fa-file-invoice"></i> Payment History</a></li>

    <li class="nav-item"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/unloced-seekers" class="nav-link"><i class="fas fa-user" aria-hidden="true"></i> Unlocked Users</a></li>
    <li class="nav-item"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/company-followers" class="nav-link"><i class="fas fa-users" aria-hidden="true"></i> Company Followers</a></li>


    <li class="nav-item"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/company/logout" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a> </li>
    <form id="logout-form-header1" action="https://www.sharjeelanjum.com/demos/jobsportal-update/company/logout" method="POST" style="display: none;">
      <input type="hidden" name="_token" value="dWQSThWOrTMy01T95xVXyfir5JdgLkzNqN6fLUtu" autocomplete="off">
    </form>
  </ul>



  <!-- Header end -->
  <!-- Search start -->
  <div class="searchwrap">

    <div class="container">

      <div class="row">
        <div class="col-lg-6">

          <div class="srjobseeker">
            <div class="bxsrctxt">
              <h1>Find Top Skilled Candidates.</h1>
              <p>Simply enter your resume criteria to instantly search from millions of live, top quality resumes</p>


            </div>
            <div class="searchbarbt">
              <form action="https://www.sharjeelanjum.com/demos/jobsportal-update/job-seekers" method="get">
                <div class="searchbar">

                  <h3>Resume Search for Employers</h3>

                  <div class="srchbox">
                    <div class="input-group mt-3">
                      <input type="text" name="search" id="empsearch" value="" class="form-control" placeholder="Search Candidate" autocomplete="off">
                      <input id="country_id" name="country_id[]" type="hidden" value="231">


                      <span id="state_dd"><select id="state_id" class="form-control" name="state_id[]">
                          <option value="">Select State</option>
                          <option value="3919">Alabama</option>
                          <option value="3920">Alaska</option>
                          <option value="3921">Arizona</option>
                          <option value="3922">Arkansas</option>
                          <option value="3923">Byram</option>
                          <option value="3924">California</option>
                          <option value="3925">Cokato</option>
                          <option value="3926">Colorado</option>
                          <option value="3927">Connecticut</option>
                          <option value="3928">Delaware</option>
                          <option value="3929">District of Columbia</option>
                          <option value="3930">Florida</option>
                          <option value="3931">Georgia</option>
                          <option value="3932">Hawaii</option>
                          <option value="3933">Idaho</option>
                          <option value="3934">Illinois</option>
                          <option value="3935">Indiana</option>
                          <option value="3936">Iowa</option>
                          <option value="3937">Kansas</option>
                          <option value="3938">Kentucky</option>
                          <option value="3939">Louisiana</option>
                          <option value="3940">Lowa</option>
                          <option value="3941">Maine</option>
                          <option value="3942">Maryland</option>
                          <option value="3943">Massachusetts</option>
                          <option value="3944">Medfield</option>
                          <option value="3945">Michigan</option>
                          <option value="3946">Minnesota</option>
                          <option value="3947">Mississippi</option>
                          <option value="3948">Missouri</option>
                          <option value="3949">Montana</option>
                          <option value="3950">Nebraska</option>
                          <option value="3951">Nevada</option>
                          <option value="3952">New Hampshire</option>
                          <option value="3953">New Jersey</option>
                          <option value="3954">New Jersy</option>
                          <option value="3955">New Mexico</option>
                          <option value="3956">New York</option>
                          <option value="3957">North Carolina</option>
                          <option value="3958">North Dakota</option>
                          <option value="3959">Ohio</option>
                          <option value="3960">Oklahoma</option>
                          <option value="3961">Ontario</option>
                          <option value="3962">Oregon</option>
                          <option value="3963">Pennsylvania</option>
                          <option value="3964">Ramey</option>
                          <option value="3965">Rhode Island</option>
                          <option value="3966">South Carolina</option>
                          <option value="3967">South Dakota</option>
                          <option value="3968">Sublimity</option>
                          <option value="3969">Tennessee</option>
                          <option value="3970">Texas</option>
                          <option value="3971">Trimble</option>
                          <option value="3972">Utah</option>
                          <option value="3973">Vermont</option>
                          <option value="3974">Virginia</option>
                          <option value="3975">Washington</option>
                          <option value="3976">West Virginia</option>
                          <option value="3977">Wisconsin</option>
                          <option value="3978">Wyoming</option>
                        </select></span>

                      <span id="city_dd">
                        <select class="form-control" id="city_id" name="city_id[]">
                          <option value="" selected="selected">Select City</option>
                        </select>
                      </span>

                      <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </form>

            </div>
          </div>

        </div>
        <div class="col-lg-6">

          <div class="homesearchimg"><img src="https://www.sharjeelanjum.com/demos/jobsportal-update/images/search-bg_1741804553.jpg"></div>
        </div>
      </div>

    </div>
  </div>

  <div class="infodatawrap">
    <div class="container">
      <div class="row">
        <div class="col-md-6"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/my-profile" class="userloginbox">

            <h3>Search your desired Job</h3>
            <p>Discover a career you are passionate about</p>
            <img src="https://www.sharjeelanjum.com/demos/jobsportal-update/images/search-job-icon.png" alt="Search your desired Job">

          </a>


        </div>
        <div class="col-md-6"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/register" class="userloginbox">


            <h3>Post a Job Today</h3>
            <p>Discover the ideal candidate for your team</p>
            <img src="https://www.sharjeelanjum.com/demos/jobsportal-update/images/postjob.png" alt="Post a Job Today">

          </a>
        </div>
      </div>

    </div>
  </div>
  <!-- Featured Jobs start -->
  <div class="section featuredjobwrap">
    <div class="container">
      <!-- title start -->
      <div class="titleTop text-center mb-5">
        <h3>Latest Jobs</h3>
      </div>
      <!-- title end -->
      <?php
      // saari jobs fetch karo (latest first)
      $sql = "SELECT * FROM jobs WHERE status='active' ORDER BY created_at DESC";
      $result = mysqli_query($conn, $sql);
      ?>
      <!--Featured Job start-->

      <div class="row">
        <?php if (mysqli_num_rows($result) > 0): ?>
          <?php while ($job = mysqli_fetch_assoc($result)): ?>
            <div class="col-md-4 mb-4">

              <!-- Wrap whole card in anchor -->
              <a href="view_jobs.php?id=<?= $job['id'] ?>" class="text-decoration-none text-dark">
                <div class="card card-success h-100 shadow-sm border
              transition transform hover-shadow" style="border-radius: 20px;">
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
                        <span class="text-dark fs-4" title="<?= htmlspecialchars($job['title']) ?>">
                          <?= htmlspecialchars($job['title']) ?>
                        </span>
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
                      <div class="jobcompany d-flex mt-3 justify-content-between align-items-center py-2 px-3 border rounded-4 border-0" style="background: #f3f3f3;">
                        <div class="ftjobcomp">
                          <span><?= date("M d, Y", strtotime($job['created_at'])) ?></span>
                          <span title="<?= htmlspecialchars($job['functional_area_id']) ?>">
                            <?= htmlspecialchars($job['functional_area_id']) ?>
                          </span>
                        </div>
                        <div class="company-logo" title="<?= htmlspecialchars($job['company_name']) ?>">
                          <img src="./assets/img/logo tef.png" alt="<?= htmlspecialchars($job['company_name']) ?>" title="<?= htmlspecialchars($job['company_name']) ?>">
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </a>
              <!-- End anchor -->

            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p class="text-center">No jobs found.</p>
        <?php endif; ?>
      </div>

      <!--Featured Job end-->

      <!--button start-->
      <!-- <div class="viewallbtn"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?is_featured=1">View All Featured Jobs</a></div> -->
      <!--button end-->

    </div>



  </div><!-- Featured Jobs ends -->













  <!-- Hire Candidate -->
  <div class="modal fade mypremodal" id="hireme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="modal-body">
          <div class="preuserinfo">
            <h3>Our users rely on us to keep their information secure.</h3>
            <p>Log in or register as an employer to access candidate details.</p>

            <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/company-login" class="btn btn-yellow mt-3">Login</a>
            <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/company-register" class="btn btn-dark mt-3">Register</a>

          </div>
        </div>

      </div>
    </div>
  </div>




  <!-- Premium Ends -->

  <!-- How it Works start -->
  <div class="howitsection greybg">
    <div class="container">
      <div class="howitwrap">


        <!-- title start -->
        <div class="titleTop">
          <h3>How It Works</h3>
        </div>
        <!-- title end -->
        <ul class="howlist row">
          <!--step 1-->
          <li class="col-lg-4">
            <div class="iconcircle"><span class="material-symbols-outlined">person_add</span></div>
            <div class="">
              <h4>Create An Account</h4>
              <p>It's very easy to open an account and start your journey.</p>
            </div>
          </li>
          <!--step 1 end-->
          <!--step 2-->
          <li class="col-lg-4">
            <div class="iconcircle"><span class="material-symbols-outlined">fact_check</span></div>
            <div class="">
              <h4>Complete your profile</h4>
              <p>Complete your profile with all the info to get attention of client.</p>
            </div>
          </li>
          <!--step 2 end-->
          <!--step 3-->
          <li class="col-lg-4">
            <div class="iconcircle"><span class="material-symbols-outlined">touchpad_mouse</span></div>
            <div class="">
              <h4>Apply job or hire</h4>
              <p>Apply &amp; get your preferable jobs with all the requirements and get it.</p>
            </div>
          </li>
          <!--step 3 end-->
        </ul>

      </div>


    </div>
  </div><!-- How it Works Ends -->


  <!-- Testimonials start -->
  <div class="section testimonialwrap">
    <div class="container">
      <!-- title start -->
      <div class="titleTop">
        <div class="subtitle">Testimonials</div>
        <h3>Success Stories</h3>
      </div>
      <!-- title end -->

      <ul class="testimonialsList owl-carousel owl-loaded owl-drag">



        <div class="owl-stage-outer">
          <div class="owl-stage" style="left: -1278px; width: 3834px;">
            <div class="owl-item cloned" style="width: 396px; margin-right: 30px;">
              <li class="item">
                <div class="ratinguser">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>"Iam a recent graduate, struggled to find a job in my field. I joined Ekonty Jobs and customized my profile, highlighting my skills and experiences. Within weeks, I received interview invitations from top companies. I landed my dream job at a tech startup, and I credit Ekonty Jobs for connecting me with the right opportunity"</p>
                <div class="clientname">Javeria</div>
                <div class="clientinfo">CEO - Gates Inc</div>
              </li>
            </div>
            <div class="owl-item cloned" style="width: 396px; margin-right: 30px;">
              <li class="item">
                <div class="ratinguser">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>"I had been stuck in a dead-end job for years. I decided to explore Ekonty Jobs and discovered a listing for a position that aligned perfectly with my passion for marketing. After applying, I received personalized career advice from the platform. I aced the interview and secured the role, kickstarting my exciting career journey."</p>
                <div class="clientname">Ayesha</div>
                <div class="clientinfo">client</div>
              </li>
            </div>
            <div class="owl-item cloned" style="width: 396px; margin-right: 30px;">
              <li class="item">
                <div class="ratinguser">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>"Iam a working mom, needed flexibility in my job. I turned to Ekonty Jobs and found remote job listings that allowed me to balance work and family life. Iam now working as a content writer for an international company, all thanks to Ekonty
                  Jobs’ user-friendly interface and extensive job listings."</p>
                <div class="clientname">Maria</div>
                <div class="clientinfo">Client</div>
              </li>
            </div>
            <div class="owl-item active" style="width: 396px; margin-right: 30px;">
              <li class="item">
                <div class="ratinguser">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>"Iam a recent graduate, struggled to find a job in my field. I joined Ekonty Jobs and customized my profile, highlighting my skills and experiences. Within weeks, I received interview invitations from top companies. I landed my dream job at a tech startup, and I credit Ekonty Jobs for connecting me with the right opportunity"</p>
                <div class="clientname">Javeria</div>
                <div class="clientinfo">CEO - Gates Inc</div>
              </li>
            </div>
            <div class="owl-item active" style="width: 396px; margin-right: 30px;">
              <li class="item">
                <div class="ratinguser">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>"I had been stuck in a dead-end job for years. I decided to explore Ekonty Jobs and discovered a listing for a position that aligned perfectly with my passion for marketing. After applying, I received personalized career advice from the platform. I aced the interview and secured the role, kickstarting my exciting career journey."</p>
                <div class="clientname">Sana</div>
                <div class="clientinfo">client</div>
              </li>
            </div>
            <div class="owl-item active" style="width: 396px; margin-right: 30px;">
              <li class="item">
                <div class="ratinguser">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>"Iam a working mom, needed flexibility in my job. I turned to Ekonty Jobs and found remote job listings that allowed me to balance work and family life. Iam now working as a content writer for an international company, all thanks to Ekonty
                  Jobs’ user-friendly interface and extensive job listings."</p>
                <div class="clientname">Maria</div>
                <div class="clientinfo">Client</div>
              </li>
            </div>
            <div class="owl-item cloned" style="width: 396px; margin-right: 30px;">
              <li class="item">
                <div class="ratinguser">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>"Iam a recent graduate, struggled to find a job in my field. I joined Ekonty Jobs and customized my profile, highlighting my skills and experiences. Within weeks, I received interview invitations from top companies. I landed my dream job at a tech startup, and I credit Ekonty Jobs for connecting me with the right opportunity"</p>
                <div class="clientname">Javeria</div>
                <div class="clientinfo">CEO - Gates Inc</div>
              </li>
            </div>
            <div class="owl-item cloned" style="width: 396px; margin-right: 30px;">
              <li class="item">
                <div class="ratinguser">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>"I had been stuck in a dead-end job for years. I decided to explore Ekonty Jobs and discovered a listing for a position that aligned perfectly with my passion for marketing. After applying, I received personalized career advice from the platform. I aced the interview and secured the role, kickstarting my exciting career journey."</p>
                <div class="clientname">Sana</div>
                <div class="clientinfo">client</div>
              </li>
            </div>
            <div class="owl-item cloned" style="width: 396px; margin-right: 30px;">
              <li class="item">
                <div class="ratinguser">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p>"Iam a working mom, needed flexibility in my job. I turned to Ekonty Jobs and found remote job listings that allowed me to balance work and family life. Iam now working as a content writer for an international company, all thanks to Ekonty
                  Jobs’ user-friendly interface and extensive job listings."</p>
                <div class="clientname">Mariam</div>
                <div class="clientinfo">Client</div>
              </li>
            </div>
          </div>
        </div>
      </ul>
    </div>
  </div><!-- Testimonials End -->

  <!-- Top countrie start -->
  <!-- <div class="section countrieswrap greybg">
        <div class="container">
           
            <div class="titleTop text-center">
                <h3>Find Jobs by Country</h3>
            </div>
            
            <div class="srchint">
                <ul class="row countrieslist">
                    <li class="col-lg-3 col-md-6">
                        <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?country_id%5B%5D=231" title="United States of America" class="countryinfobox">
                            <h4>Jobs in United States of America</h4>
                            <span>(7) Open Jobs</span>
                        </a>
                    </li>
                    <li class="col-lg-3 col-md-6">
                        <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?country_id%5B%5D=166" title="Pakistan" class="countryinfobox">
                            <h4>Jobs in Pakistan</h4>
                            <span>(2) Open Jobs</span>
                        </a>
                    </li>
                    <li class="col-lg-3 col-md-6">
                        <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?country_id%5B%5D=13" title="Australia" class="countryinfobox">
                            <h4>Jobs in Australia</h4>
                            <span>(1) Open Jobs</span>
                        </a>
                    </li>
                </ul>
                
            </div>
        </div>
    </div> -->
  <!-- Top countrie End -->



  <div class="footerWrap">
    <div class="container">
      <div class="row">

        <!--Quick Links-->
        <div class="col-md-3 col-sm-6">
          <h5>Quick Links</h5>
          <!--Quick Links menu Start-->
          <ul class="quicklinks">
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update">Home</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/contact-us">Contact Us</a></li>
            <li class="postad"><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/post-job">Post a Job</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/faq">FAQs</a></li>

            <li class=""><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/cms/about-us">About Us</a></li>

            <li class=""><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/cms/terms-of-usev">Terms Of Use</a></li>
          </ul>
        </div>
        <!--Quick Links menu end-->

        <div class="col-md-3 col-sm-6">
          <h5>Jobs By Functional Area</h5>
          <!--Quick Links menu Start-->
          <ul class="quicklinks">
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?functional_area_id%5B%5D=9">Advertisment</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?functional_area_id%5B%5D=3">Admin</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?functional_area_id%5B%5D=641">Administrative</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?functional_area_id%5B%5D=633">Information Technology</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?functional_area_id%5B%5D=8">Advertising</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?functional_area_id%5B%5D=2">Accounts, Finance &amp; Financial Services</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?functional_area_id%5B%5D=23">Creative Design</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?functional_area_id%5B%5D=638">Health Care Provider</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?functional_area_id%5B%5D=40">Graphic Design</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?functional_area_id%5B%5D=74">Medicine</a></li>
          </ul>
        </div>

        <!--Jobs By Industry-->
        <div class="col-md-3 col-sm-6">
          <h5>Jobs By Industry</h5>
          <!--Industry menu Start-->
          <ul class="quicklinks">
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?industry_id%5B%5D=38">Health &amp; Fitness</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?industry_id%5B%5D=7">Advertising/PR</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?industry_id%5B%5D=1">Information Technology</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?industry_id%5B%5D=28">Electronics</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?industry_id%5B%5D=32">Fashion</a></li>
            <li><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/search-jobs?industry_id%5B%5D=10">Manufacturing</a></li>
          </ul>
          <!--Industry menu End-->
          <div class="clear"></div>
        </div>

        <!--About Us-->
        <div class="col-md-3 col-sm-12">
          <h5>Contact Us</h5>
          <div class="address">651 N Broad St, Suite 201, Middletown,
            Zip Code 19709, New Castle,&nbsp;Delaware,&nbsp;USA.</div>
          <div class="email"> <a href="mailto:info@jobsportal.com">info@jobsportal.com</a> </div>
          <!-- Social Icons -->
          <div class="social"><a href="www.facebook.com" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>
            <a href="www.x.com" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
              </svg></a>
            <a href="#" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
            <a href="www.linkedin.com" target="_blank"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
            <a href="#" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a>
          </div>
          <!-- Social Icons end -->

        </div>
        <!--About us End-->


      </div>
    </div>
  </div>
  <!--Footer end-->
  <!--Copyright-->
  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="bttxt">Copyright © 2025 JOBS PORTAL. All Rights Reserved. Design by: <a href="https://piratestechnologies.com/" target="_blank">Javeria Noor </a></div>
        </div>
        <div class="col-md-4">
          <div class="paylogos"><img src="https://www.sharjeelanjum.com/demos/jobsportal-update/images/payment-icons.png" alt=""></div>
        </div>
      </div>

    </div>
  </div>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.min.js" data-turbolinks-eval="false" data-turbo-eval="false"></script> -->
  <!-- Bootstrap's JavaScript -->


  <script type="text/javascript" async="" charset="utf-8" src="https://www.gstatic.com/recaptcha/releases/2sJvksnKlEApLvJt2btz_q7n/recaptcha__en.js" crossorigin="anonymous" integrity="sha384-LemK5f1mYuwn+DuidBucDgDYKJdVkYJ6e33AxSMj6dqtdFjUZx6FY4ZyOY9nFK23"></script>
  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/jquery.min.js"></script>
  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/popper.js"></script>
  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/bootstrap.bundle.min.js"></script>



  <!-- Owl carousel -->

  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/jquery-ui.min.js"></script>

  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/owl.carousel.js"></script>

  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/admin_assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/admin_assets/global/plugins/Bootstrap-3-Typeahead/bootstrap3-typeahead.min.js" type="text/javascript"></script>

  <!-- END PAGE LEVEL PLUGINS -->

  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/admin_assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/admin_assets/global/plugins/jquery.scrollTo.min.js" type="text/javascript"></script>


  <!-- Revolution Slider -->

  <script type="text/javascript" src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>

  <script type="text/javascript" src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>


  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/sweetalert.min.js"></script>

  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/jquery.validate.js"></script>

  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/jquery.validate.additional-methods.min.js"></script>
  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/dragula.min.js"></script>


  <script src="https://www.google.com/recaptcha/api.js?" async="" defer=""></script>
  <script src="assets/js/app.min.js"></script>



  <script>
    $(document).ready(function($) {
      $("form").submit(function() {
        $(this).find(":input").filter(function() {
          return !this.value;
        }).attr("disabled", "disabled");
        return true;
      });
      $("form").find(":input").prop("disabled", false);
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function($) {
      $('#country_id').on('change', function(e) {
        e.preventDefault();
        filterStates(0);
      });
      $(document).on('change', '#state_id', function(e) {
        e.preventDefault();
        filterCities(0);
      });
      filterStates(0);
    });

    function filterStates(state_id) {
      var country_id = $('#country_id').val();
      if (country_id != '') {
        $.post("https://www.sharjeelanjum.com/demos/jobsportal-update/filter-states-dropdown", {
            country_id: country_id,
            state_id: state_id,
            _method: 'POST',
            _token: 'dWQSThWOrTMy01T95xVXyfir5JdgLkzNqN6fLUtu'
          })
          .done(function(response) {
            $('#state_dd').html(response);
            filterCities(0);
          });
      }
    }

    function filterCities(city_id) {
      var state_id = $('#state_id').val();
      if (state_id != '') {
        $.post("https://www.sharjeelanjum.com/demos/jobsportal-update/filter-cities-dropdown", {
            state_id: state_id,
            city_id: city_id,
            _method: 'POST',
            _token: 'dWQSThWOrTMy01T95xVXyfir5JdgLkzNqN6fLUtu'
          })
          .done(function(response) {
            $('#city_dd').html(response);
          });
      }
    }
  </script>
  <!-- Custom js -->

  <script src="https://www.sharjeelanjum.com/demos/jobsportal-update/js/script.js"></script>

  <script type="text/JavaScript">

    $(document).ready(function(){

            $(document).scrollTo('.has-error', 2000);

            });

            function showProcessingForm(btn_id){		

            $("#"+btn_id).val( 'Processing .....' );

            $("#"+btn_id).attr('disabled','disabled');		

            }

		

		setInterval("hide_savedAlert()",7000);

        function hide_savedAlert(){

          $(document).find('.svjobalert').hide();

        }



        $(document).ready(function(){

            $.ajax({

                type: 'get',

                url: "https://www.sharjeelanjum.com/demos/jobsportal-update/check-time",

                success: function(res) {

                        $('.notification').html(res);

                   

                }

            });

        });

		

        </script>
  <script type="text/javascript">
    $("#jbsearch").autocomplete({
      source: function(request, response) {
        $.ajax({
          url: "https://www.sharjeelanjum.com/demos/jobsportal-update/jobs-autocomplete", // API endpoint to fetch suggestions
          dataType: "json",
          data: {
            term: request.term
          },
          success: function(data) {
            response(data);
          }
        });
      },
      minLength: 2,
      select: function(event, ui) {
        // Action after selecting a suggestion
      }
    });

    $(document).ready(function() {
      $('.select2-multiple-jobtype').select2({
        placeholder: "Select Multiple Jobtypes",
        allowClear: true
      });
    })

    function showAdvanceSearch() {
      $("#showAdvanceSearchRow").show();
      $('.select2-multiple-jobtype').select2({
        placeholder: "Select Multiple Jobtypes",
        allowClear: true
      });

      $("#advSearch").hide();
    }
  </script>





</body>

</html>