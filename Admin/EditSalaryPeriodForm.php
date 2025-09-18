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
                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-8">
                                    <div class="card shadow-sm border-0 rounded-3">
                                        <div class="card-header bg-success text-white">
                                            <h5 class="mb-0"><i class="fas fa-money-bill-wave me-2"></i> Edit Salary
                                                Period</h5>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <!-- Salary Period -->
                                                <div class="form-group mb-3">
                                                    <label>Salary Period</label>
                                                    <input type="text" class="form-control" value="Monthly">
                                                </div>

                                                <!-- Description -->
                                                <div class="form-group mb-3">
                                                    <label>Description</label>
                                                    <textarea class="form-control"
                                                        rows="3">Salary will be paid every month</textarea>
                                                </div>

                                                <!-- Status -->
                                                <div class="form-group mb-3">
                                                    <label>Status</label>
                                                    <select class="form-control">
                                                        <option selected>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
                                                </div>

                                                <!-- Buttons -->
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-secondary me-2" style="margin-right: 10px;">Cancel</button>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>









                        <!-- DataTables JS -->



                        <!-- DataTables JS -->

  </section>
            </div>

            <?php include('includes/footer.php'); ?>
        </div>
    </div>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>