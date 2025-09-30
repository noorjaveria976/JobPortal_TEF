<?php
session_start();
include 'include/config.php';
// Logged in user ka ID
$user_id = $_SESSION['user_id'] ?? 0;
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
                        <div class="userccount">
                            <div class="formpanel mt0">
                                <script>
                                    var elements = document.querySelectorAll('.popmessage, .bgoverlay');

                                    if (elements.length > 0) {
                                        setTimeout(function() {
                                            elements.forEach(function(element) {
                                                element.style.display = 'none';
                                            });
                                        }, 5000);
                                    }
                                </script>
                                <!-- Personal Information -->
                                <?php

                                // Fetch existing profile data
                                $profile = mysqli_query($conn, "SELECT * FROM job_seeker_profiles WHERE user_id='$user_id' LIMIT 1");
                                $data = mysqli_fetch_assoc($profile);
                                ?>

                                <form method="POST" action="save_profile_sql.php" accept-charset="UTF-8" class="form" enctype="multipart/form-data">

                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">

                                    <h5>Account Information</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="formrow">
                                                <label>Email</label>
                                                <input class="form-control" id="email" name="email" type="text"
                                                    value="<?= htmlspecialchars($data['email'] ?? '') ?>" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="formrow">
                                                <label>Password</label>
                                                <input class="form-control" id="password" name="password" type="password"
                                                    value="<?= htmlspecialchars($data['password'] ?? '') ?>" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h5>Personal Information</h5>
                                    <div class="row p-2 g-1">
                                        <div class="col-md-6 pe-3">
                                            <div class="userimgupbox bg-white p-5">
                                                <div class="imagearea text-center">
                                                    <label class="fw-semibold">Profile Image <span>*</span></label>
                                                    <img src="uploads/profile/<?= $data['profile_image'] ?? 'default.png' ?>"
                                                        style="max-width:100px; max-height:100px;" alt="Profile">
                                                </div>
                                                <div class="formrow">
                                                    <label class="btn btn-light bg-transparent w-100 p-2 text-uppercase"
                                                        style="border: 2px dashed #ccc;">
                                                        <i class="fas fa-upload"></i> Select Profile Image
                                                        <input type="file" name="image" id="image" style="display:none;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 ps-4">
                                            <div class="userimgupbox bg-white p-5">
                                                <div class="imagearea text-center">
                                                    <label class="fw-semibold">Cover Photo</label>
                                                    <img src="uploads/cover/<?= $data['cover_images'] ?? 'default_cover.png' ?>"
                                                        style="max-width:200px; max-height:90px;" alt="Cover">
                                                </div>
                                                <div class="formrow">
                                                    <label class="btn btn-light bg-transparent w-100 p-2 text-uppercase"
                                                        style="border: 2px dashed #ccc;">
                                                        <i class="fas fa-upload"></i> Select Cover Photo
                                                        <input type="file" name="cover_image" id="cover_image" style="display:none;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label>First Name <span>*</span></label>
                                            <input class="form-control" name="first_name" type="text"
                                                value="<?= htmlspecialchars($data['first_name'] ?? '') ?>" placeholder="First Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Last Name <span>*</span></label>
                                            <input class="form-control" name="last_name" type="text"
                                                value="<?= htmlspecialchars($data['last_name'] ?? '') ?>" placeholder="Last Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nick Name</label>
                                            <input class="form-control" name="middle_name" type="text"
                                                value="<?= htmlspecialchars($data['middle_name'] ?? '') ?>" placeholder="Nick Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Gender <span>*</span></label>
                                            <select class="form-control" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male" <?= ($data['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
                                                <option value="Female" <?= ($data['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Marital Status <span>*</span></label>
                                            <select class="form-control" name="marital_status">
                                                <option value="">Select</option>
                                                <option value="Single" <?= ($data['marital_status'] ?? '') == 'Single' ? 'selected' : '' ?>>Single</option>
                                                <option value="Married" <?= ($data['marital_status'] ?? '') == 'Married' ? 'selected' : '' ?>>Married</option>
                                                <option value="Divorced" <?= ($data['marital_status'] ?? '') == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
                                                <option value="Widow/er" <?= ($data['marital_status'] ?? '') == 'Widow/er' ? 'selected' : '' ?>>Widow/er</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Country</label>
                                            <input class="form-control" name="country" type="text"
                                                value="<?= htmlspecialchars($data['country'] ?? '') ?>" placeholder="Country">
                                        </div>
                                        <div class="col-md-3">
                                            <label>State</label>
                                            <input class="form-control" name="state" type="text"
                                                value="<?= htmlspecialchars($data['state'] ?? '') ?>" placeholder="State">
                                        </div>
                                        <div class="col-md-3">
                                            <label>City</label>
                                            <input class="form-control" name="city" type="text"
                                                value="<?= htmlspecialchars($data['city'] ?? '') ?>" placeholder="City">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nationality</label>
                                            <input class="form-control" name="nationality" type="text"
                                                value="<?= htmlspecialchars($data['nationality'] ?? '') ?>" placeholder="Nationality">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Date of Birth</label>
                                            <input class="form-control" name="date_of_birth" type="date"
                                                value="<?= htmlspecialchars($data['date_of_birth'] ?? '') ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" type="text"
                                                value="<?= htmlspecialchars($data['phone'] ?? '') ?>" placeholder="Phone">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Mobile</label>
                                            <input class="form-control" name="mobile_num" type="text"
                                                value="<?= htmlspecialchars($data['mobile_num'] ?? '') ?>" placeholder="Mobile">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Street Address</label>
                                            <textarea class="form-control" name="street_address" rows="3"
                                                placeholder="Street Address"><?= htmlspecialchars($data['street_address'] ?? '') ?></textarea>
                                        </div>
                                    </div>

                                    <hr>
                                    <h5>Career Information</h5>
                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <label>Job Experience</label>
                                            <input class="form-control" name="job_experience" type="text"
                                                value="<?= htmlspecialchars($data['job_experience'] ?? '') ?>" placeholder="Job Experience">
                                        </div> -->
                                        <div class="col-md-6">
                                            <div>
                                                <label for="">Job Experience <span>*</span></label>
                                                <select class="form-control" name="job_experience">
                                                    <option value="">Select Experience</option>
                                                    <option value="Fresh"> <?= ($data['job_experience'] ?? '') == 'Fresh' ? 'selected' : '' ?> Fresh</option>
                                                    <option value="Less Than 1 Year"> <?= ($data['job_experience'] ?? '') == 'Less Than 1 Year' ? 'selected' : '' ?> Less Than 1 Year</option>
                                                    <option value="1 Year"> <?= ($data['job_experience'] ?? '') == '1 Year' ? 'selected' : '' ?> 1 Year</option>
                                                    <option value="2 years"> <?= ($data['job_experience'] ?? '') == '2 years' ? 'selected' : '' ?> 2 years</option>
                                                    <option value="3 years"> <?= ($data['job_experience'] ?? '') == ' 3 year' ? 'selected' : '' ?> 3 years</option>
                                                    <option value="4 years"> <?= ($data['job_experience'] ?? '') == '4 years' ? 'selected' : '' ?> 4 years</option>
                                                    <option value="5 years"> <?= ($data['job_experience'] ?? '') == '5 years' ? 'selected' : '' ?> 5 years</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Career Level</label>
                                            <input class="form-control" name="career_level" type="text"
                                                value="<?= htmlspecialchars($data['career_level'] ?? '') ?>" placeholder="Career Level">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Industry</label>
                                            <input class="form-control" name="industry" type="text"
                                                value="<?= htmlspecialchars($data['industry'] ?? '') ?>" placeholder="Industry">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Functional Area</label>
                                            <input class="form-control" name="functional_area" type="text"
                                                value="<?= htmlspecialchars($data['functional_area'] ?? '') ?>" placeholder="Functional Area">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Salary Currency</label>
                                            <input class="form-control" name="salary_currency" type="text"
                                                value="<?= htmlspecialchars($data['salary_currency'] ?? '') ?>" placeholder="Currency">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Current Salary</label>
                                            <input class="form-control" name="current_salary" type="text"
                                                value="<?= htmlspecialchars($data['current_salary'] ?? '') ?>" placeholder="Current Salary">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Expected Salary</label>
                                            <input class="form-control" name="expected_salary" type="text"
                                                value="<?= htmlspecialchars($data['expected_salary'] ?? '') ?>" placeholder="Expected Salary">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <h5>Summary</h5>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="summary" rows="5"
                                                placeholder="Profile Summary"><?= htmlspecialchars($data['summary'] ?? '') ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label>
                                                <input type="checkbox" name="is_subscribed" <?= ($data['is_subscribed'] ?? 0) ? 'checked' : '' ?>>
                                                Subscribe to Newsletter
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary w-100">Update Profile and Save</button>
                                        </div>
                                    </div>
                                </form>




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
    <script src="assets/js/bootstrap3-typeahead.min.js" type="text/javascript"></script>

    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>

    <script>
        $("#profile_form").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "save_profile_sql.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    let response = JSON.parse(res);
                    alert(response.message);
                    location.reload();
                }
            });
        });
    </script>

</body>




</html>




