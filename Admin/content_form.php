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

                                <div class="container ">

                                    <div class="card shadow-sm">
                                        <div class="card-header bg-primary text-white">
                                            <i class="bi bi-file-earmark-text"></i> Content Page Form
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label class="form-label">Page Title</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter page title">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Slug (URL)</label>
                                                    <input type="text" class="form-control" placeholder="e.g. about-us">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Content</label>
                                                    <textarea class="form-control" rows="6"
                                                        placeholder="Enter page content"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success"><i class="bi bi-save"></i>
                                                    Save Page</button>
                                                <button type="reset" class="btn btn-secondary"><i
                                                        class="bi bi-x-circle"></i> Reset</button>
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