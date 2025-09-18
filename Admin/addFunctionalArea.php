<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Functional Area</title>
    <?php include "includes/source.html"; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php include "includes/navbar.php"; ?>
            <?php include "includes/sidebar.html"; ?>

            <div class="main-content">
                <section class="section">
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card card-primary">
                                    <div class="card-header  d-flex justify-content-between">
                                        <h5 class="mb-0"><i class="fas fa-plus me-2"></i> Add Functional Area</h5>
                                        <a href="FunctionalAreas.php" class="btn btn-sm btn-light"><i class="fas fa-list"></i> View All</a>
                                    </div>
                                    <div class="card-body p-4">
                                        <form action="includes/save-functional-area.php" method="POST">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label>Functional Area</label>
                                                    <input type="text" class="form-control" name="functional_area" placeholder="e.g. IT, HR" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status" required>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-4">
                                                <button type="reset" class="btn btn-outline-secondary me-2" style="margin-right: 10px;"><i class="fas fa-undo"></i> Reset</button>
                                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <?php include "includes/footer.php"; ?>
        </div>
    </div>
    <script src="assets/js/page/datatables.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>