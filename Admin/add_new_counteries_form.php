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

            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="container ">

                                    <div class="card shadow-sm card-primary">
                                        <div class="card-body">
                                            <i class="fas fa-plus-circle"></i> Add / Edit Country
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label class="form-label"><i class="fas fa-flag"></i> Country Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter country name">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label"><i class="fas fa-globe"></i> ISO Code</label>
                                                    <input type="text" class="form-control" placeholder="Enter ISO code (e.g. PK, US)">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label"><i class="fas fa-language"></i> Default Language</label>
                                                    <select class="form-control">
                                                        <option value="">-- Select Language --</option>
                                                        <option value="en">English</option>
                                                        <option value="ur">Urdu</option>
                                                        <option value="hi">Hindi</option>
                                                        <option value="ar">Arabic</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label"><i class="fas fa-toggle-on"></i> Status</label>
                                                    <select class="form-control">
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Save Country
                                                </button>
                                                <button type="reset" class="btn btn-secondary">
                                                    <i class="fas fa-undo"></i> Reset
                                                </button>
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