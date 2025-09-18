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


                                <div class="card shadow-sm mt-4">
                                    <div class="card-header">
                                        <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Company</h5>
                                    </div>

                                    <div class="card-body">
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label">Company Name</label>
                                                <input type="text" class="form-control" value="TechSoft Pvt Ltd">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Industry</label>
                                                <input type="text" class="form-control" value="Software">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Contact Person</label>
                                                <input type="text" class="form-control" value="Ali Khan">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Contact Email</label>
                                                <input type="email" class="form-control" value="ali@techsoft.com">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Contact Phone</label>
                                                <input type="text" class="form-control" value="+92 300 1234567">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Website</label>
                                                <input type="url" class="form-control" value="https://techsoft.com">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control"
                                                    rows="3">123 Tech Street, Lahore, Pakistan</textarea>
                                            </div>

                                               <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control">
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                    <option>Pending</option>

                                                </select>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-secondary">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update Company</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <!-- Upload Form -->



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