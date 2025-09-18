<?php
session_start();
include "config/db.php";

// Example: get ID from URL (no DB fetch)
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;
$industry_name = "Information Technology";
$industry_desc = "Short description here";
$status = 1; // Active
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Industry</title>
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
                    <div class="row g-3 mb-4 d-flex justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-header bg-warning text-white">
                                    <i class="fas fa-edit me-2"></i> Edit Industry
                                </div>
                                <div class="card-body">
                                    <form action="includes/save-industry.php" method="post">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <div class="mb-3">
                                            <label for="industryName" class="form-label">Industry Name</label>
                                            <input type="text" class="form-control" id="industryName"
                                                   name="industry_name" value="<?= $industry_name ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="industryDesc" class="form-label">Description</label>
                                            <textarea class="form-control" id="industryDesc"
                                                      name="industry_desc" rows="3"><?= $industry_desc ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="1" <?= $status==1?'selected':'' ?>>Active</option>
                                                <option value="0" <?= $status==0?'selected':'' ?>>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-2">
                                                <i class="fas fa-save"></i> Update Industry
                                            </button>
                                            <a href="Industry.php" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left"></i> Cancel
                                            </a>
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
</body>
</html>
