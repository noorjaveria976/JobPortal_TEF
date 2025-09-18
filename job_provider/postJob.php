<?php
session_start();
include "../job_seeker/include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title            = mysqli_real_escape_string($conn, $_POST['title']);
    $description      = mysqli_real_escape_string($conn, $_POST['description']);
    $benefits         = mysqli_real_escape_string($conn, $_POST['benefits']);
    $country_id       = $_POST['country_id'];
    $state_id         = $_POST['state_id'];
    $city_id          = $_POST['city_id'];
    $company_name     = mysqli_real_escape_string($conn, $_POST['company_name']); // Added
    $salary_from      = $_POST['salary_from'];
    $salary_to        = $_POST['salary_to'];
    $salary_currency  = $_POST['salary_currency'];
    $salary_period_id = $_POST['salary_period_id'];
    $hide_salary      = $_POST['hide_salary'];
    $career_level_id  = $_POST['career_level_id'];
    $functional_area_id = $_POST['functional_area_id'];
    $job_type_id      = $_POST['job_type_id'];
    $job_shift_id     = $_POST['job_shift_id'];
    $num_of_positions = $_POST['num_of_positions'];
    $gender_id        = $_POST['gender_id'];
    $expiry_date      = $_POST['expiry_date'];
    $degree_level_id  = $_POST['degree_level_id'];
    $job_experience_id = $_POST['job_experience_id'];
    $is_freelance     = $_POST['is_freelance'];
    $external_job     = $_POST['external_job'];
    $job_link         = mysqli_real_escape_string($conn, $_POST['job_link']);

    $sql = "INSERT INTO jobs (
                title, description, benefits, country_id, state_id, city_id, company_name,
                salary_from, salary_to, salary_currency, salary_period_id, hide_salary,
                career_level_id, functional_area_id, job_type_id, job_shift_id,
                num_of_positions, gender_id, expiry_date, degree_level_id, job_experience_id,
                is_freelance, external_job, job_link
            ) VALUES (
                '$title', '$description', '$benefits', '$country_id', '$state_id', '$city_id', '$company_name',
                '$salary_from', '$salary_to', '$salary_currency', '$salary_period_id', '$hide_salary',
                '$career_level_id', '$functional_area_id', '$job_type_id', '$job_shift_id',
                '$num_of_positions', '$gender_id', '$expiry_date', '$degree_level_id', '$job_experience_id',
                '$is_freelance', '$external_job', '$job_link'
            )";

    if ($conn->query($sql) === TRUE) {
        // $_SESSION['success'] = "Job posted successfully!";
        header("Location: postJob.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Career Levels</title>
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include "includes/source.html"; ?>
    <link rel="stylesheet" href="assets/css/Customs.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

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
            <?php include "includes/navbar.php"; ?>
            <?php include "includes/sidebar.html"; ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <!-- add content here -->
                        <!-- Personal Information -->
                        <!-- Personal Information -->
                        <h5>Job Details</h5>
                        <form method="POST" action="" accept-charset="UTF-8" class="form"><input name="_token"
                                type="hidden" value="HmbWBIt1dbfdyve9yXAnvJiW636QuLsC5vGcLS1L">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="formrow "> <input class="form-control" id="title"
                                            placeholder="Job title" name="title" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="formrow ">
                                        <label for="" class="pb-2">Description</label>
                                        <textarea id="description" name="description"
                                            class="form-control summernote-simple">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias minus quod dignissimos.</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 ">
                                    <div class="formrow ">
                                        <label for="" class="pb-2">Benefits</label>
                                        <textarea id="benefits" name="benefits"
                                            class="form-control summernote-simple">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias minus quod dignissimos.</textarea>
                                    </div>
                                </div>



                                <div class="col-md-4 ">
                                    <div class="formrow " id="country_id_div"> <select class="form-control"
                                            id="country_id" name="country_id">
                                            <option value="">Select Country</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="formrow" id="city_id_div">
                                        <select class="form-control" id="city_id" name="city_id">
                                            <option value="" selected>Select City</option>
                                            <option value="Lahore">Lahore</option>
                                            <option value="Karachi">Karachi</option>
                                            <option value="Islamabad">Islamabad</option>
                                            <option value="Faisalabad">Faisalabad</option>
                                            <option value="Multan">Multan</option>
                                            <option value="Rawalpindi">Rawalpindi</option>
                                            <option value="Peshawar">Peshawar</option>
                                            <option value="Quetta">Quetta</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="formrow">
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name" required>
                                    </div>
                                </div>
                         
                                <div class="col-md-6 mt-3">
                                    <div class="formrow " id="salary_from_div"> <input class="form-control"
                                            id="salary_from" placeholder="Salary from" name="salary_from" type="number">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="formrow " id="salary_to_div">
                                        <input class="form-control" id="salary_to" placeholder="Salary to"
                                            name="salary_to" type="number">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="formrow " id="salary_currency_div">

                                        <select class="form-control" id="salary_currency" name="salary_currency">
                                            <option value="">Select Salary Currency</option>
                                            <option value="£">SYP (£)</option>
                                            <option value="$">USD ($)</option>
                                            <option value="€">EUR (€)</option>
                                            <option value="د.إ">AED (د.إ)</option>
                                            <option value="؋">AF (؋)</option>
                                            <option value="Lek">ALL (Lek)</option>
                                            <option value="ƒ">AWG (ƒ)</option>
                                            <option value="ман">AZ (ман)</option>
                                            <option value="KM">BAM (KM)</option>
                                            <option value="лв">UZS (лв)</option>
                                            <option value="$b">BOB ($b)</option>
                                            <option value="R$">BRL (R$)</option>
                                            <option value="P">BWP (P)</option>
                                            <option value="p.">BYR (p.)</option>
                                            <option value="CHF">CHF (CHF)</option>
                                            <option value="¥">JPY (¥)</option>
                                            <option value="₡">CRC (₡)</option>
                                            <option value="₱">CUP (₱)</option>
                                            <option value="Kč">CZK (Kč)</option>
                                            <option value="kr">SEK (kr)</option>
                                            <option value="RD$">DOP (RD$)</option>
                                            <option value="¢">GHC (¢)</option>
                                            <option value="Q">GTQ (Q)</option>
                                            <option value="L">HNL (L)</option>
                                            <option value="Ft">HUF (Ft)</option>
                                            <option value="Rp">INR (Rp)</option>
                                            <option value="₪">ILS (₪)</option>
                                            <option value="﷼">YER (﷼)</option>
                                            <option value="J$">JMD (J$)</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="formrow " id="salary_period_id_div"> <select class="form-control"
                                            id="salary_period_id" name="salary_period_id">
                                            <option value="" selected="selected">Select Salary Period</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Yearly">Yearly</option>
                                            <option value="5"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="formrow "> <label for="hide_salary" class="bold">Hide Salary?</label>
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                                <input id="hide_salary_yes" name="hide_salary" type="radio" value="1">
                                                Yes </label>
                                            <label class="radio-inline">
                                                <input id="hide_salary_no" name="hide_salary" type="radio" value="0"
                                                    checked=&quot;checked&quot;>
                                                No </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="formrow " id="career_level_id_div"> <select class="form-control"
                                            id="career_level_id" name="career_level_id">
                                            <option value="" selected="selected">Select Career level</option>
                                            <option value="Department Head">Department Head</option>
                                            <option value="Entry Level">Entry Level</option>
                                            <option value="Experienced Professional">Experienced Professional</option>
                                            <option value="GM / CEO / Country Head / President">GM / CEO / Country Head / President</option>
                                            <option value="Intern/Student">Intern/Student</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="formrow " id="functional_area_id_div"> <select class="form-control"
                                            id="functional_area_id" name="functional_area_id">
                                            <option value="" selected="selected">Select Functional Area</option>
                                            <option value="Other">Other</option>
                                            
                                            <option value="Information Technology">Information Technology</option>
                                            <option value="Management and Manufacturing">Management and Manufacturing</option>
                                            <option value="Engineering and Information Technology">Engineering and Information Technology</option>
                                            <option value="Health Care Provider">Health Care Provider</option>
                                            <option value="Accounting/Auditing and Finance">Accounting/Auditing and Finance</option>
                                            <option value="Administrative">Administrative</option>
                                            <option value="Sales and Business Development">Sales and Business Development</option>
                                            <option value="Accountant">Accountant</option>
                                            <option value="Accounts, Finance &amp; Financial Services">Accounts, Finance &amp; Financial Services</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Admin Operation">Admin Operation</option>
                                            <option value="Administration">Administration</option>
                                            

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="formrow " id="job_type_id_div"> <select class="form-control"
                                            id="job_type_id" name="job_type_id">
                                            <option value="" selected="selected">Select Job Type</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Freelance">Freelance</option>
                                            <option value="Full Time/Permanent">Full Time/Permanent</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Part Time">Part Time</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="formrow " id="job_shift_id_div"> <select class="form-control"
                                            id="job_shift_id" name="job_shift_id">
                                            <option value="" selected="selected">Select Job Shift</option>
                                            <option value="First Shift (Day)">First Shift (Day)</option>
                                            <option value="Second Shift (Afternoon)">Second Shift (Afternoon)</option>
                                            <option value="Third Shift (Night)">Third Shift (Night)</option>
                                            <option value="Rotating">Rotating</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="formrow " id="num_of_positions_div"> <select class="form-control"
                                            id="num_of_positions" name="num_of_positions">
                                            <option value="" selected="selected">Select number of Positions</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="formrow " id="gender_id_div"> <select class="form-control"
                                            id="gender_id" name="gender_id">
                                            <option value="" selected="selected">No preference</option>
                                            <option value="Male">Male</option>
                                            <option value="female">female</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="formrow "> <input class="form-control datepicker" id="expiry_date"
                                            placeholder="Job expiry date" autocomplete="off" name="expiry_date"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="formrow " id="degree_level_id_div"> <select class="form-control"
                                            id="degree_level_id" name="degree_level_id">
                                            <option value="" selected="selected">Select Required Degree Level</option>
                                            <option value="Non-Matriculation">Non-Matriculation</option>
                                            <option value="Matriculation/O-Level">Matriculation/O-Level</option>
                                            <option value="Intermediate/A-Level">Intermediate/A-Level</option>
                                            <option value="Bachelors">Bachelors</option>
                                            <option value="Masters">Masters</option>
                                            <option value="MPhil/MS">MPhil/MS</option>
                                            <option value="PHD/Doctorate">PHD/Doctorate</option>
                                            <option value="Certification">Certification</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Short Course">Short Course</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="formrow " id="job_experience_id_div"> <select class="form-control"
                                            id="job_experience_id" name="job_experience_id">
                                            <option value="" selected="selected">Select Required job experience</option>
                                            <option value="Fresh">Fresh</option>
                                            <option value="Less Than 1 Year">Less Than 1 Year</option>
                                            <option value="1 Year">1 Year</option>
                                            <option value="2 years">2 years</option>
                                            <option value="3 years">3 years</option>
                                            <option value="4 years">4 years</option>
                                            <option value="5 years">5 years</option>
                                            <option value="6 years">6 years</option>
                                            <option value="7 years">7 years</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="formrow "> <label for="is_freelance" class="bold">Is Freelance?</label>
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                                <input id="is_freelance_yes" name="is_freelance" type="radio" value="1">
                                                Yes </label>
                                            <label class="radio-inline">
                                                <input id="is_freelance_no" name="is_freelance" type="radio" value="0"
                                                    checked=&quot;checked&quot;>
                                                No </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="formrow">
                                        <label for="external_job" class="bold">Is this External Job?</label>
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                                <input id="external" name="external_job" type="radio" value="yes">
                                                Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input id="not_external" name="external_job" type="radio" value="no"
                                                    checked=&quot;checked&quot;>
                                                No
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div id="externalLinkField" class="formrow" style="display: none">
                                            <label for="job_link" class="bold">External Link</label>
                                            <input class="form-control" name="job_link" type="text" value=""
                                                id="job_link">
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="formrow">
                                        <button type="submit" class=" btn1">Submit the Jobs <i
                                                class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="image" id="image" style="display:none;" accept="image/*" />
                        </form>
                        <hr>
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>







    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <?php include "includes/footer.php"; ?>
    </div>
    </div>

    <script src="assets/js/page/datatables.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.href;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
            })
        });

        <?php if (isset($_SESSION['success'])): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= $_SESSION['success'] ?>'
            });
        <?php unset($_SESSION['success']);
        endif; ?>
    </script>
</body>

</html>
<!-- sana -->