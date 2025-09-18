<?php
session_start();
include "config/db.php";
// Form submission handled in includes/save-industry.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Industry</title>
    <?php include "includes/source.html"; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php include "includes/navbar.php"; ?>
            <?php include "includes/sidebar.html"; ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <!-- Font Awesome CSS (head me include karein) -->

                                <div class="card shadow-lg border-0 rounded-3">
                                    <div class="card-header bg-primary text-white d-flex align-items-center">
                                        <i class="fas fa-flag me-2"></i>
                                        <h5 class="mb-0">Country Details Form</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="countryDetailsForm">

                                            <!-- Country Name -->
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fas fa-basketball-ball me-1 text-primary"></i> Country
                                                    Name
                                                </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter country name">
                                            </div>

                                            <!-- ISO Code -->
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fas fa-code me-1 text-success"></i> ISO Code
                                                </label>
                                                <input type="text" class="form-control" placeholder="Enter ISO code">
                                            </div>

                                            <!-- Status -->
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <i class="fas fa-toggle-on me-1 text-warning"></i> Status
                                                </label>
                                                <select class="form-control">
                                                    <option value="active">✅ Active</option>
                                                    <option value="inactive">❌ Inactive</option>
                                                </select>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="d-flex justify-content-end gap-4">
                                                <button type="reset" class="btn btn-secondary">
                                                    <i class="fas fa-undo-alt me-1 "></i> Reset
                                                </button>&nbsp;
                                                <button type="submit" class="btn btn-primary  ">
                                                    <i class="fas fa-save me-1"></i> Save
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>


                            </div>
               </section>
            </div>

            <?php include('includes/footer.php'); ?>
        </div>
    </div>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>