<?php
session_start();
include "../job_seeker/include/config.php";

// Agar edit mode hai to job id URL me milegi
$job_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$job = [];

// Agar edit mode hai to purana data fetch karo
if ($job_id > 0) {
    $sql = "SELECT * FROM jobs WHERE id = $job_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $job = mysqli_fetch_assoc($result);
}

// Dropdown ke liye tables se data fetch
$countries         = mysqli_query($conn, "SELECT id, name FROM countries ORDER BY name ASC");
$cities            = mysqli_query($conn, "SELECT id, name FROM cities ORDER BY name ASC");
$career_levels     = mysqli_query($conn, "SELECT id, name FROM career_levels ORDER BY id ASC");
$functional_areas  = mysqli_query($conn, "SELECT id, name FROM functional_areas ORDER BY name ASC");
$job_types         = mysqli_query($conn, "SELECT id, name FROM job_types ORDER BY id ASC");
$job_shifts        = mysqli_query($conn, "SELECT id, name FROM job_shifts ORDER BY id ASC");
$degree_levels     = mysqli_query($conn, "SELECT id, name FROM degree_levels ORDER BY id ASC");
$experiences       = mysqli_query($conn, "SELECT id, name FROM job_experiences ORDER BY id ASC");
$genders           = mysqli_query($conn, "SELECT id, name FROM genders ORDER BY id ASC");
$salary_periods    = mysqli_query($conn, "SELECT id, name FROM salary_periods ORDER BY id ASC");

// Form submit hone par
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Saare fields ko fetch karo
    $title             = mysqli_real_escape_string($conn, $_POST['title']);
    $description       = mysqli_real_escape_string($conn, $_POST['description']);
    $benefits          = mysqli_real_escape_string($conn, $_POST['benefits']);
    $country_id        = $_POST['country_id'];
    $city_id           = $_POST['city_id'];
    $company_name      = $_POST['company_name'];
    $salary_from       = $_POST['salary_from'];
    $salary_to         = $_POST['salary_to'];
    $salary_currency   = $_POST['salary_currency'];
    $salary_period_id  = $_POST['salary_period_id'];
    $hide_salary       = $_POST['hide_salary'];
    $career_level_id   = $_POST['career_level_id'];
    $functional_area_id= $_POST['functional_area_id'];
    $job_type_id       = $_POST['job_type_id'];
    $job_shift_id      = $_POST['job_shift_id'];
    $num_of_positions  = $_POST['num_of_positions'];
    $gender_id         = $_POST['gender_id'];
    $expiry_date       = $_POST['expiry_date'];
    $degree_level_id   = $_POST['degree_level_id'];
    $job_experience_id = $_POST['job_experience_id'];
    $is_freelance      = $_POST['is_freelance'];
    $external_job      = $_POST['external_job'];
    $job_link          = mysqli_real_escape_string($conn, $_POST['job_link']);

    if ($job_id > 0) {
        // 🔄 UPDATE Query
        $sql = "UPDATE jobs SET 
            title='$title',
            description='$description',
            benefits='$benefits',
            country_id='$country_id',
            city_id='$city_id',
            company_name='$company_name',
            salary_from='$salary_from',
            salary_to='$salary_to',
            salary_currency='$salary_currency',
            salary_period_id='$salary_period_id',
            hide_salary='$hide_salary',
            career_level_id='$career_level_id',
            functional_area_id='$functional_area_id',
            job_type_id='$job_type_id',
            job_shift_id='$job_shift_id',
            num_of_positions='$num_of_positions',
            gender_id='$gender_id',
            expiry_date='$expiry_date',
            degree_level_id='$degree_level_id',
            job_experience_id='$job_experience_id',
            is_freelance='$is_freelance',
            external_job='$external_job',
            job_link='$job_link'
        WHERE id = $job_id";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Job updated successfully!');window.location='postJob.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // ➕ INSERT Query
        $sql = "INSERT INTO jobs 
            (title, description, benefits, country_id, city_id, company_name, salary_from, salary_to, salary_currency, salary_period_id, hide_salary, career_level_id, functional_area_id, job_type_id, job_shift_id, num_of_positions, gender_id, expiry_date, degree_level_id, job_experience_id, is_freelance, external_job, job_link, created_at, status) 
        VALUES 
            ('$title','$description','$benefits','$country_id','$city_id','$company_name','$salary_from','$salary_to','$salary_currency','$salary_period_id','$hide_salary','$career_level_id','$functional_area_id','$job_type_id','$job_shift_id','$num_of_positions','$gender_id','$expiry_date','$degree_level_id','$job_experience_id','$is_freelance','$external_job','$job_link',NOW(),'active')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Job posted successfully!');window.location='postJob.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
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
                        <form method="POST" action="" accept-charset="UTF-8" class="form">
                            <div class="row">
                                <!-- Job Title -->
                                <div class="col-md-12">
                                    <input class="form-control" id="title" placeholder="Job title" name="title" type="text"
                                        value="<?= $job['title'] ?? '' ?>">
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mt-3">
                                    <label>Description</label>
                                    <textarea id="description" name="description" class="form-control summernote-simple"><?= $job['description'] ?? '' ?></textarea>
                                </div>

                                <!-- Benefits -->
                                <div class="col-md-12 mt-3">
                                    <label>Benefits</label>
                                    <textarea id="benefits" name="benefits" class="form-control summernote-simple"><?= $job['benefits'] ?? '' ?></textarea>
                                </div>

                                <!-- Country -->
                                <div class="col-md-4 mt-3">
                                    <select class="form-control" id="country_id" name="country_id">
                                        <option value="">Select Country</option>
                                        <option value="Pakistan" <?= ($job['country_id'] ?? '') == "Pakistan" ? "selected" : "" ?>>Pakistan</option>
                                        <option value="Afghanistan" <?= ($job['country_id'] ?? '') == "Afghanistan" ? "selected" : "" ?>>Afghanistan</option>
                                        <option value="Albania" <?= ($job['country_id'] ?? '') == "Albania" ? "selected" : "" ?>>Albania</option>
                                    </select>
                                </div>

                                <!-- City -->
                                <div class="col-md-4">
                                    <select class="form-control" id="city_id" name="city_id">
                                        <option value="">Select City</option>
                                        <?php
                                        $cities = ["Lahore", "Karachi", "Islamabad", "Faisalabad", "Multan", "Rawalpindi"];
                                        foreach ($cities as $c) {
                                            $sel = ($job['city_id'] ?? '') == $c ? "selected" : "";
                                            echo "<option value='$c' $sel>$c</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Company -->
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                        value="<?= $job['company_name'] ?? '' ?>" placeholder="Enter Company Name">
                                </div>
                               

                                <!-- Salary From -->
                                <div class="col-md-6 mt-3">
                                    <input class="form-control" id="salary_from" name="salary_from" type="number"
                                        value="<?= $job['salary_from'] ?? '' ?>" placeholder="Salary from">
                                </div>

                                <!-- Salary To -->
                                <div class="col-md-6 mt-3">
                                    <input class="form-control" id="salary_to" name="salary_to" type="number"
                                        value="<?= $job['salary_to'] ?? '' ?>" placeholder="Salary to">
                                </div>

                                <!-- Salary Currency -->
                                <div class="col-md-4 mt-3">
                                    <select class="form-control" id="salary_currency" name="salary_currency">
                                        <option value="">Select Salary Currency</option>
                                        <option value="$" <?= ($job['salary_currency'] ?? '') == "$" ? "selected" : "" ?>>USD ($)</option>
                                        <option value="€" <?= ($job['salary_currency'] ?? '') == "€" ? "selected" : "" ?>>EUR (€)</option>
                                        <option value="£" <?= ($job['salary_currency'] ?? '') == "£" ? "selected" : "" ?>>GBP (£)</option>
                                    </select>
                                </div>

                                <!-- Salary Period -->
                                <div class="col-md-4 mt-3">
                                    <select class="form-control" id="salary_period_id" name="salary_period_id">
                                        <option value="">Select Salary Period</option>
                                        <option value="Weekly" <?= ($job['salary_period_id'] ?? '') == "Weekly" ? "selected" : "" ?>>Weekly</option>
                                        <option value="Monthly" <?= ($job['salary_period_id'] ?? '') == "Monthly" ? "selected" : "" ?>>Monthly</option>
                                        <option value="Yearly" <?= ($job['salary_period_id'] ?? '') == "Yearly" ? "selected" : "" ?>>Yearly</option>
                                    </select>
                                </div>

                                <!-- Hide Salary -->
                                <div class="col-md-4 mt-3">
                                    <label>Hide Salary?</label><br>
                                    <label><input type="radio" name="hide_salary" value="1" <?= ($job['hide_salary'] ?? '') == "1" ? "checked" : "" ?>> Yes</label>
                                    <label><input type="radio" name="hide_salary" value="0" <?= ($job['hide_salary'] ?? '0') == "0" ? "checked" : "" ?>> No</label>
                                </div>

                                <!-- Career Level -->
                                <div class="col-md-6 mt-3">
                                    <select class="form-control" id="career_level_id" name="career_level_id">
                                        <option value="">Select Career Level</option>
                                        <option value="Entry Level" <?= ($job['career_level_id'] ?? '') == "Entry Level" ? "selected" : "" ?>>Entry Level</option>
                                        <option value="Experienced Professional" <?= ($job['career_level_id'] ?? '') == "Experienced Professional" ? "selected" : "" ?>>Experienced Professional</option>
                                    </select>
                                </div>

                                <!-- Functional Area -->
                                <div class="col-md-6 mt-3">
                                    <select class="form-control" id="functional_area_id" name="functional_area_id">
                                        <option value="">Select Functional Area</option>
                                        <option value="Information Technology" <?= ($job['functional_area_id'] ?? '') == "Information Technology" ? "selected" : "" ?>>Information Technology</option>
                                        <option value="Sales and Business Development" <?= ($job['functional_area_id'] ?? '') == "Sales and Business Development" ? "selected" : "" ?>>Sales and Business Development</option>
                                    </select>
                                </div>

                                <!-- Job Type -->
                                <div class="col-md-6 mt-3">
                                    <select class="form-control" id="job_type_id" name="job_type_id">
                                        <option value="">Select Job Type</option>
                                        <option value="Full Time/Permanent" <?= ($job['job_type_id'] ?? '') == "Full Time/Permanent" ? "selected" : "" ?>>Full Time/Permanent</option>
                                        <option value="Part Time" <?= ($job['job_type_id'] ?? '') == "Part Time" ? "selected" : "" ?>>Part Time</option>
                                        <option value="Internship" <?= ($job['job_type_id'] ?? '') == "Internship" ? "selected" : "" ?>>Internship</option>
                                    </select>
                                </div>

                                <!-- Job Shift -->
                                <div class="col-md-6 mt-3">
                                    <select class="form-control" id="job_shift_id" name="job_shift_id">
                                        <option value="">Select Job Shift</option>
                                        <option value="First Shift (Day)" <?= ($job['job_shift_id'] ?? '') == "First Shift (Day)" ? "selected" : "" ?>>First Shift (Day)</option>
                                        <option value="Second Shift (Afternoon)" <?= ($job['job_shift_id'] ?? '') == "Second Shift (Afternoon)" ? "selected" : "" ?>>Second Shift (Afternoon)</option>
                                    </select>
                                </div>

                                <!-- Positions -->
                                <div class="col-md-6 mt-3">
                                    <input type="number" class="form-control" id="num_of_positions" name="num_of_positions"
                                        value="<?= $job['num_of_positions'] ?? '' ?>" placeholder="Number of Positions">
                                </div>

                                <!-- Gender -->
                                <div class="col-md-6 mt-3">
                                    <select class="form-control" id="gender_id" name="gender_id">
                                        <option value="">No preference</option>
                                        <option value="Male" <?= ($job['gender_id'] ?? '') == "Male" ? "selected" : "" ?>>Male</option>
                                        <option value="Female" <?= ($job['gender_id'] ?? '') == "Female" ? "selected" : "" ?>>Female</option>
                                    </select>
                                </div>

                                <!-- Expiry Date -->
                                <div class="col-md-6 mt-3">
                                    <input type="text" class="form-control datepicker" id="expiry_date" name="expiry_date"
                                        value="<?= $job['expiry_date'] ?? '' ?>" placeholder="Job expiry date">
                                </div>

                                <!-- Degree -->
                                <div class="col-md-6 mt-3">
                                    <select class="form-control" id="degree_level_id" name="degree_level_id">
                                        <option value="">Select Required Degree</option>
                                        <option value="Bachelors" <?= ($job['degree_level_id'] ?? '') == "Bachelors" ? "selected" : "" ?>>Bachelors</option>
                                        <option value="Masters" <?= ($job['degree_level_id'] ?? '') == "Masters" ? "selected" : "" ?>>Masters</option>
                                    </select>
                                </div>

                                <!-- Experience -->
                                <div class="col-md-6 mt-3">
                                    <select class="form-control" id="job_experience_id" name="job_experience_id">
                                        <option value="">Select Experience</option>
                                        <option value="Fresh" <?= ($job['job_experience_id'] ?? '') == "Fresh" ? "selected" : "" ?>>Fresh</option>
                                        <option value="2 years" <?= ($job['job_experience_id'] ?? '') == "2 years" ? "selected" : "" ?>>2 years</option>
                                    </select>
                                </div>

                                <!-- Freelance -->
                                <div class="col-md-6 mt-3">
                                    <label>Is Freelance?</label><br>
                                    <label><input type="radio" name="is_freelance" value="1" <?= ($job['is_freelance'] ?? '') == "1" ? "checked" : "" ?>> Yes</label>
                                    <label><input type="radio" name="is_freelance" value="0" <?= ($job['is_freelance'] ?? '0') == "0" ? "checked" : "" ?>> No</label>
                                </div>

                                <!-- External Job -->
                                <div class="col-md-12 mt-3">
                                    <label>Is this External Job?</label><br>
                                    <label><input type="radio" name="external_job" value="yes" <?= ($job['external_job'] ?? '') == "yes" ? "checked" : "" ?>> Yes</label>
                                    <label><input type="radio" name="external_job" value="no" <?= ($job['external_job'] ?? 'no') == "no" ? "checked" : "" ?>> No</label>
                                </div>

                                <!-- External Link -->
                                <div class="col-md-12 mt-3">
                                    <input class="form-control" name="job_link" type="text" id="job_link"
                                        value="<?= $job['job_link'] ?? '' ?>" placeholder="External Link">
                                </div>

                                <!-- Submit -->
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn1">
                                        <?= $job_id > 0 ? "Update Job" : "Post Job" ?>
                                    </button>
                                </div>
                            </div>
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