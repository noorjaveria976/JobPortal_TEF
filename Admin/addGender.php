<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Gender</title>
    <?php include "includes/source.html"; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php include "includes/navbar.php"; ?>
            <?php include "includes/sidebar.html"; ?>

            <div class="main-content">
                <section class="section">
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-9">
                            <div class="card shadow-sm card-primary">
                                <div class="h5  card-header" >
                                    <i class="fas fa-venus-mars me-2 ms-3"></i> Add New Gender
                                </div>
                                <div class="card-body">
                                    <form action="includes/save-gender.php" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">Gender Name</label>
                                            <input type="text" class="form-control" name="gender_name" placeholder="e.g. Male, Female" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-secondary me-2" style="margin-right: 10px;"><i class="fas fa-undo"></i> Reset</button>
                                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                    </form>
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