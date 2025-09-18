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
                                    <div class="card shadow border-0 rounded-4">
                                        <div class="card-header bg-primary text-white d-flex align-items-center">
                                            <i class="fas fa-cogs me-2"></i>
                                            <h4 class="mb-0 text-white">Manage Site Settings</h4>
                                        </div>
                                        <div class="card-body p-4">
                                            <form>

                                                <!-- Site Logo -->
                                                <div class="mb-3">
    <label class="form-label"><i class="fas fa-image"></i> Client Image</label>

    <!-- Preview Box -->
    <div class="mb-3">
      <img id="clientPreview" 
           src="./assets/img/blog/blankProfilePhoto.png" 
           class="img-thumbnail d-block" 
           style="max-width: 150px; max-height: 150px;">
    </div>

    <!-- File Input -->
    <input type="file" class="form-control" id="clientImageInput" accept="image/*">
    <div class="form-text">Allowed formats: JPG, PNG, GIF</div>
  </div>
                                                <!-- Contact Email -->
                                                <div class="mb-4">
                                                    <label class="form-label">
                                                        <i class="fas fa-envelope me-2 text-success"></i> Contact Email
                                                    </label>
                                                    <input type="email" class="form-control form-control-lg"
                                                        placeholder="Enter contact email">
                                                </div>

                                                <!-- Site Title -->
                                                <div class="mb-4">
                                                    <label class="form-label">
                                                        <i class="fas fa-heading me-2 text-info"></i> Site Title
                                                    </label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="Enter site title">
                                                </div>

                                                <!-- Site Description -->
                                                <div class="mb-4">
                                                    <label class="form-label">
                                                        <i class="fas fa-align-left me-2 text-warning"></i> Site
                                                        Description
                                                    </label>
                                                    <textarea class="form-control form-control-lg" rows="3"
                                                        placeholder="Enter site description"></textarea>
                                                </div>

                                                <!-- Currency -->
                                                <div class="mb-4">
                                                    <label class="form-label">
                                                        <i class="fas fa-dollar-sign me-2 text-info"></i> Default
                                                        Currency
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="e.g. USD">
                                                </div>

                                                <!-- Timezone -->
                                                <div class="mb-4">
                                                    <label class="form-label">
                                                        <i class="fas fa-clock me-2 text-warning"></i> Timezone
                                                    </label>
                                                   <select class="form-select btn btn-outline-secondary">
                                                        <option value=""  class="bg-white">Select Timezone</option>
                                                        <option class="bg-white text-dark">UTC-12:00</option>
                                                        <option class="bg-white text-dark">UTC-05:00</option>
                                                        <option class="bg-white text-dark">UTC+00:00</option>
                                                        <option class="bg-white text-dark">UTC+05:00</option>
                                                        <option class="bg-white text-dark">UTC+12:00</option>
                                                    </select>
                                                </div>

                                                <!-- Status -->
                                                <div class="mb-4 d-flex align-items-center">
                                                    <label class="form-label me-3 mb-0">
                                                        <i class="fas fa-toggle-on me-2 text-danger"></i> Site Active
                                                    </label>
                                                  <select class="form-select btn btn-outline-secondary">
                                                        <option value="1" class="bg-white text-dark">Active</option>
                                                        <option value="0" class="bg-white text-dark">Inactive</option>
                                                    </select>
                                                </div>
                                                

                                                <!-- Buttons -->
                                                <div class="d-flex justify-content-end ">
                                                    <button type="reset" class="btn btn-outline-secondary ">
                                                        <i class="fas fa-undo me-1"></i> Reset
                                                    </button>
                                                    <button type="submit" class="btn btn-primary " style="margin-left: 10px;">
                                                        <i class="fas fa-save me-1"></i> Save Settings
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