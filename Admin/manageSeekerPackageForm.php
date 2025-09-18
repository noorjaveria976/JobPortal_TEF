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



                                <!-- Upload Form -->

                                <!-- SEEKER PACKAGES DATA TABLE -->

                                <!-- SEEKER PACKAGES DATA TABLE -->
                                <!-- SEEKER PACKAGE FORM (Updated Duration Dropdown) -->
                                <!-- SEEKER PACKAGE FORM -->
                                <div class="container ">
                                    <div class="card shadow-sm border-0 rounded-3">
                                        <div class="card-header bg-success text-white d-flex align-items-center">
                                            <i class="fas fa-plus-circle me-2"></i>
                                            <h5 class="mb-0">Add / Edit Seeker Package</h5>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <!-- Package Name -->
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        <i class="fas fa-id-badge me-1 text-primary"></i> Package Name
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter package name">
                                                </div>

                                                <!-- Allowed Applications -->
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        <i class="fas fa-briefcase me-1 text-success"></i> Allowed
                                                        Applications
                                                    </label>
                                                    <input type="number" class="form-control" placeholder="e.g. 20">
                                                </div>
                                                <!-- Duration -->
                                                <div class="form-group">
      <i class="fas fa-clock me-1 text-warning"></i> Select Duration
                                                    <select class="form-control">
                                                        <option>12 days</option>
                                                        <option>65 days</option>
                                                    </select>
                                                </div>
                                                <!-- Price -->
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        <i class="fas fa-dollar-sign me-1 text-info"></i> Price
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="$ Enter price">
                                                </div>

                                                <!-- Features (checkboxes) -->
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        <i class="fas fa-list me-1 text-secondary"></i> Features
                                                    </label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="highlight">
                                                        <label class="form-check-label" for="highlight">Highlight
                                                            Applications</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="priority">
                                                        <label class="form-check-label" for="priority">Priority
                                                            Review</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="support">
                                                        <label class="form-check-label" for="support">Premium
                                                            Support</label>
                                                    </div>
                                                </div>

                                                <!-- Status -->
                                                        <div class="form-group">
                                                        <i class="fas fa-toggle-on me-1 text-danger"></i> Status
                                                <select class="form-control">
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                    <option>Pending</option>

                                                </select>
                                            </div>

                                                <!-- Buttons -->
                                                <div class="d-flex justify-content-between">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-save me-1"></i> Save Package
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary">
                                                        <i class="fas fa-undo me-1"></i> Reset
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>










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