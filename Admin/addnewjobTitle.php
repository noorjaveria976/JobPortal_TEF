<?php
session_start();
include "config/db.php";

$job_title = "";
$industry  = "";
$status    = 1;
$id        = 0;

// Edit Mode
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM job_titles WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $job_title = $row['job_title'];
        $industry  = $row['industry'];
        $status    = $row['status'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $id>0 ? "Edit" : "Add" ?> Job Title</title>
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
                    <div class="col-lg-9 mx-auto">
                        <div class="card shadow-sm card-primary">
                            <div class="card-header h5">
                                <i class="fas fa-briefcase me-2"></i> <?= $id>0 ? "Edit" : "Add" ?> Job Title
                            </div>
                            <div class="card-body">
                                <form action="includes/save-job-title.php" method="post">
                                    <input type="hidden" name="id" value="<?= $id ?>">

                                    <!-- Job Title -->
                                    <div class="mb-3">
                                        <label class="form-label">Job Title</label>
                                        <input type="text" class="form-control" name="job_title"
                                               value="<?= htmlspecialchars($job_title) ?>" placeholder="Enter job title" required>
                                    </div>

                                    <!-- Industry -->
                                    <div class="mb-3">
                                        <label class="form-label">Industry</label>
                                        <input type="text" class="form-control" name="industry"
                                               value="<?= htmlspecialchars($industry) ?>" placeholder="Enter industry" required>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="1" <?= $status==1?"selected":"" ?>>Active</option>
                                            <option value="0" <?= $status==0?"selected":"" ?>>Inactive</option>
                                        </select>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-success me-2" style="margin-right: 10px;">
                                            <i class="fas fa-save"></i> <?= $id>0 ? "Update" : "Save" ?>
                                        </button>
                                        <button type="reset" class="btn btn-secondary">
                                            <i class="fas fa-undo"></i> Reset
                                        </button>
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
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
