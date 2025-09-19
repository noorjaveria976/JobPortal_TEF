<?php
session_start();
include "../job_seeker/include/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/Customs.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>


<style type="text/css">
    .userccount p {
        text-align: left !important;

    }

    /* Normal state */
    .btn1 {
        background-color: #0400ff;
        color: #ffffff;
        padding: 10px 18px;
        border-radius: 5px;
        border: none;
        transition: all 0.3s ease;
        width: 100%;
        height: 40px;
    }

    /* Hover state */
    .btn1:hover {
        background-color: black;
        color: white;
    }
</style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                        data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                            <span class="badge headerBadge1">
                                6 </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">John
                                            Deo</span>
                                        <span class="time messege-text">Please check your mail !!</span>
                                        <span class="time">2 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Request for leave
                                            application</span>
                                        <span class="time">5 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                                            Ryan</span> <span class="time messege-text">Your payment invoice is
                                            generated.</span> <span class="time">12 Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                                            Smith</span> <span class="time messege-text">hii John, I have upload
                                            doc
                                            related to task.</span> <span class="time">30
                                            Min Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                                            Joshi</span> <span class="time messege-text">Please do as specify.
                                            Let me
                                            know if you have any query.</span> <span class="time">1
                                            Days Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                                        <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                            Smith</span> <span class="time messege-text">Client Requirements</span>
                                        <span class="time">2 Days Ago</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                                        class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                                    </span> <span class="dropdown-item-desc"> Template update is
                                        available now! <span class="time">2 Min
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                                    </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                                            Sugiharto</b> are now friends <span class="time">10 Hours
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-success text-white"> <i class="fas
												fa-check"></i>
                                    </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                                        moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                                            Hours
                                            Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-danger text-white"> <i
                                            class="fas fa-exclamation-triangle"></i>
                                    </span> <span class="dropdown-item-desc"> Low disk space. Let's
                                        clean it! <span class="time">17 Hours Ago</span>
                                    </span>
                                </a> <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                                    </span> <span class="dropdown-item-desc"> Welcome to Otika
                                        template! <span class="time">Yesterday</span>
                                    </span>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="assets/img/user.png" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello Sarah Smith</div>
                            <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
                            </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                Activities
                            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                                class="logo-name">Otika</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown active">
                            <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Edit Account
                                    Detail</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="./editAccountDetail.html">Edit Acount detail</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Company Public
                                    Profile</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="./CompanyPuplicProfile.html">Company Public Profile</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Post a
                                    Jobs</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="./postJob.html">Post a Jobs</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Manage
                                    Jobs</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="./managethePostedJob.html">Manage Posted job</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>
                                    CV search Package</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="./CVSearchPackage.html">Cv
                                        Search packages
                                    </a></li>
                            </ul>
                        </li>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>
                                    Payment History</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="./paymentHistory.html">Payment History</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>
                                    Unlock users</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="./UnlockUser.html">Unlcok Users</a></li>
                                \
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>
                                    Company Messages</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="./companymesage.html">Company Messages</a></li>
                            </ul>
                        </li>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>
                                    Company Profile</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="./CompanyFlowers.html"> Company Profile</a></li>
                                <!-- <li><a class="nav-link" href="./Testimonial_form.html">Add new Testimonial</a></li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>
                                    Location</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="./manage_location.html">Manage Location</a></li>
                                <li><a class="nav-link" href="./manage_location_form.html">Add new Location</a></li>
                                <li><a class="nav-link" href="./counteries.html">All Counteries</a></li>
                                <li><a class="nav-link" href="./counteries_detail_form.html">Counteries Details</a></li>
                                <li><a class="nav-link" href="./state_datatable.html">State</a></li>
                                <li><a class="nav-link" href="./cities_table.html">Cities</a></li>

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>
                                    Employer Package</span></a>
                            <ul class="dropdown-menu">

                            </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <!-- add content here -->
                        <!-- Personal Information -->
                        <h3>Manage Jobs</h3>

                        <!-- Tabs start -->
                        <ul class="nav nav-tabs mt-4" id="jobTabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="active-tab" data-toggle="tab" href="#active-jobs">Active
                                    Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="expired-tab" data-toggle="tab" href="#expired-jobs">Expired
                                    Jobs</a>
                            </li>
                        </ul>
                        <!-- Tabs end -->

                        <div class="tab-content">
                            <!-- Active Jobs start -->
                            <div class="tab-pane fade show active" id="active-jobs">
                                <?php
                                // saari jobs fetch karo (latest first)
                                $sql = "SELECT * FROM jobs WHERE status='active' ORDER BY created_at DESC";

                                $result = mysqli_query($conn, $sql);
                                ?>
                                <!-- card with php -->
                                <ul class="row list-unstyled">
                                    <?php if (mysqli_num_rows($result) > 0): ?>
                                        <?php while ($job = mysqli_fetch_assoc($result)): ?>
                                            <li class="col-lg-6 col-md-6 mb-4" id="job_li_<?= $job['id'] ?>">
                                                <div class="jobint p-3 border rounded shadow-sm ">

                                                    <!-- Job Type -->
                                                    <div class="d-flex mb-2">
                                                        <div class="fticon">
                                                            <i class="fas fa-briefcase"></i>
                                                            <?= htmlspecialchars($job['job_type_id']) ?>
                                                        </div>
                                                    </div>

                                                    <!-- Job Title -->
                                                    <h4 class="mb-2">
                                                        <a href="viewjob.php?id=<?= $job['id'] ?>"
                                                            title="<?= htmlspecialchars($job['title']) ?>"
                                                            class="text-decoration-none text-dark">
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
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <?= htmlspecialchars($job['city_id']) ?>
                                                    </strong>

                                                    <!-- Date -->
                                                    <span class="ms-2"><?= date("M d, Y", strtotime($job['created_at'])) ?></span>

                                                    <!-- Action Buttons -->
                                                    <div class="d-flex mt-3 compjobslinks">
                                                        <a class="btn btn-primary me-2"
                                                            href="candidates.php?job_id=<?= $job['id'] ?>">
                                                            Candidates
                                                            <span class="badge bg-white text-dark">2</span>
                                                        </a>

                                                        <a class="btn btn-warning me-2"
                                                            href="postJob.php?id=<?= $job['id'] ?>">
                                                            Repost
                                                        </a>

                                                        <a class="btn btn-danger"
                                                            href="javascript:;"
                                                            onclick="deleteJob(<?= $job['id'] ?>, 'active');">
                                                            <i class="fas fa-trash"></i>
                                                        </a>


                                                    </div>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <p class="text-center">No jobs found.</p>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <!-- Active Jobs end -->

                            <!-- Expired Jobs start -->
                            <div class="tab-pane fade" id="expired-jobs">
                                <?php
                                // saari jobs fetch karo (latest first)
                                $sql = "SELECT * FROM jobs WHERE status='expired' ORDER BY created_at DESC";


                                $result = mysqli_query($conn, $sql);
                                ?>
                                <!-- card with php -->
                                <ul class="row list-unstyled">
                                    <?php if (mysqli_num_rows($result) > 0): ?>
                                        <?php while ($job = mysqli_fetch_assoc($result)): ?>
                                            <li class="col-lg-6 col-md-6 mb-4" id="job_li_<?= $job['id'] ?>">
                                                <div class="jobint p-3 border rounded shadow-sm ">

                                                    <!-- Job Type -->
                                                    <div class="d-flex mb-2">
                                                        <div class="fticon">
                                                            <i class="fas fa-briefcase"></i>
                                                            <?= htmlspecialchars($job['job_type_id']) ?>
                                                        </div>
                                                    </div>

                                                    <!-- Job Title -->
                                                    <h4 class="mb-2">
                                                        <a href="viewjob.php?id=<?= $job['id'] ?>"
                                                            title="<?= htmlspecialchars($job['title']) ?>"
                                                            class="text-decoration-none text-dark">
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
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <?= htmlspecialchars($job['city_id']) ?>
                                                    </strong>

                                                    <!-- Date -->
                                                    <span class="ms-2"><?= date("M d, Y", strtotime($job['created_at'])) ?></span>

                                                    <!-- Action Buttons -->
                                                    <div class="d-flex mt-3 compjobslinks">
                                                        <a class="btn btn-primary me-2"
                                                            href="candidates.php?job_id=<?= $job['id'] ?>">
                                                            Candidates
                                                            <span class="badge bg-white text-dark">2</span>
                                                        </a>

                                                        <a class="btn btn-warning me-2"
                                                            href="repost_job.php?id=<?= $job['id'] ?>">
                                                            Repost
                                                        </a>

                                                        <a class="btn btn-danger"
                                                            href="javascript:;"
                                                            onclick="deleteJob(<?= $job['id'] ?>, 'expired');">
                                                            <i class="fas fa-trash"></i>
                                                        </a>



                                                    </div>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <p class="text-center">No jobs found.</p>
                                    <?php endif; ?>
                                </ul>

                                <!-- <ul class="featuredlist row">

                                    <li class="col-lg-6 col-md-6" id="job_li_95">
                                        <div class="jobint">

                                            <div class="d-flex">
                                                <div class="fticon"><i class="fas fa-briefcase"></i> Contract</div>
                                            </div>
                                            <h4><a href="https://www.sharjeelanjum.com/demos/jobsportal-update/job/engineer-95"
                                                    title="engineer">engineer</a>
                                            </h4>

                                            <div class="salary mb-2">Salary: <strong>0 - 0/Monthly</strong></div>

                                            <strong><i class="fas fa-map-marker-alt"></i> Alabaster</strong>
                                            <span>Aug 29, 2025</span>
                                            <div class="d-flex mt-3 compjobslinks">
                                                <a class="btn btn-primary " style="margin-right: 10px;"
                                                    href="./ListApplieduser.html">Candidates
                                                    <span class="badge bg-white text-dark">2</span>
                                                </a>
                                                <a class="btn btn-warning me-2" style="margin-right: 10px;"
                                                    href="./postJob.html">Repost</a>
                                                <a class="btn btn-danger me-2" href="javascript:;"
                                                    onclick="deleteJob(97);"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>















                                </ul> -->
                            </div>
                            <!-- Expired Jobs end -->
                        </div>

                        <!-- Pagination Start -->
                        <div class="pagiWrap mt-4">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="showreslt">
                                        Showing Jobs : 11 - 13 Total 13
                                    </div>
                                </div>








                            </div>
                        </div>
                        <div class="col-md-7 text-right">
                            <nav role="navigation" aria-label="Pagination Navigation"
                                class="flex items-center justify-between">
                                <div class="flex justify-between flex-1 sm:hidden">
                                    <a href="./managethepostedJobsONE.html"
                                        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                        style="color: blue;">
                                        &laquo; Previous
                                    </a>

                                    <span
                                        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md"
                                        style="color: #0400ff;">
                                        Next &raquo;
                                    </span>
                                </div>

                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700 leading-5">
                                            Showing
                                            <span class="font-medium">11</span>
                                            to
                                            <span class="font-medium">13</span>
                                            of
                                            <span class="font-medium">13</span>
                                            results
                                        </p>
                                    </div>

                                    <div>
                                        <span class="relative z-0 inline-flex shadow-sm rounded-md">

                                            <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/posted-jobs?page=1"
                                                rel="prev"
                                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                                                aria-label="&amp;laquo; Previous">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>





                                            <a href="https://www.sharjeelanjum.com/demos/jobsportal-update/posted-jobs?page=1"
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                                aria-label="Go to page 1">
                                                1
                                            </a>
                                            <span aria-current="page">
                                                <span
                                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">2</span>
                                            </span>


                                            <span aria-disabled="true" aria-label="Next &amp;raquo;">
                                                <span
                                                    class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5"
                                                    aria-hidden="true">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </nav>

                        </div>
                    </div>
            </div>
            <!-- Pagination end -->
        </div>
    </div>
    </div>
    </div>
    <footer class="main-footer">
        <div class="footer-left">
            <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
    </footer>
    </div>
    </div>
    <!-- General JS Scripts -->
    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

    <!-- jQuery UI (before DataTables if needed) -->
    <!-- <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script> -->


    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/chartjs/chart.min.js"></script>
    <script src="assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="assets/bundles/summernote/summernote-bs4.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/widget-data.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>

    <!-- expire / delete job -->
    <script>
        function deleteJob(jobId, type) {
            let action = (type === 'active') ? 'expire' : 'delete';
            let confirmMsg = (type === 'active') ?
                "Are you sure you want to expire this job?" :
                "Are you sure you want to permanently delete this job?";

            if (confirm(confirmMsg)) {
                fetch("delete_job.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: "id=" + jobId + "&action=" + action
                    })
                    .then(res => res.text())
                    .then(data => {
                        if (data.trim() === "success") {
                            let jobElement = document.getElementById("job_li_" + jobId);

                            if (type === 'active') {
                                // 1) Active se remove karo
                                jobElement.remove();

                                // 2) Expired jobs list me add karo
                                let expiredList = document.querySelector("#expired-jobs ul");
                                if (expiredList && jobElement) {
                                    let clone = jobElement.cloneNode(true);

                                    // Button ka onclick update karo for permanent delete
                                    let deleteBtn = clone.querySelector(".btn-danger");
                                    deleteBtn.setAttribute("onclick", "deleteJob(" + jobId + ", 'expired');");

                                    expiredList.prepend(clone);
                                }

                                alert("Job moved to expired.");
                            } else {
                                // Expired job permanently delete
                                jobElement.remove();
                                alert("Job permanently deleted.");
                            }
                        } else {
                            alert("Error: " + data);
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert("Something went wrong.");
                    });
            }
        }
    </script>







</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>