<?php
session_start();
include "config/db.php";

// Initialize variables
$experience_title = "";
$experience_desc  = "";
$status = 1;
$id = 0;

// Edit mode
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM job_experience WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $experience_title = $row['experience_title'];
        $experience_desc  = $row['experience_desc'];
        $status = $row['status'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $id>0 ? "Edit" : "Add" ?> Job Experience</title>
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
                    <div class="col-lg-12">
                        <div class="card shadow-sm card-primary">
                            <div class="card-header h5">
                                <i class="fas fa-briefcase me-2 h5"></i> <?= $id>0 ? "Edit" : "Add" ?> Job Experience
                            </div>
                            <div class="card-body">
                                <form action="includes/save-job-experience.php" method="post">
                                    <input type="hidden" name="id" value="<?= $id ?>">

                                    <div class="mb-3">
                                        <label for="experienceTitle" class="form-label">
                                            <i class="fas fa-briefcase me-2 text-secondary"></i> Experience Title
                                        </label>
                                        <input type="text" class="form-control" id="experienceTitle"
                                               name="experience_title" placeholder="e.g. Entry Level (0–1 Years)"
                                               value="<?= htmlspecialchars($experience_title) ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="experienceDesc" class="form-label">
                                            <i class="fas fa-align-left me-2 text-secondary"></i> Description
                                        </label>
                                        <textarea class="form-control" id="experienceDesc"
                                                  name="experience_desc" rows="3"
                                                  placeholder="Enter short description"><?= htmlspecialchars($experience_desc) ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control twxt-white" id="status" name="status" required>
                                            <option  value="1" <?= $status==1 ? "selected" : "" ?>>   Active</option>
                                            <option value="0" <?= $status==0 ? "selected" : "" ?>>Inactive</option>
                                        </select>
                                    </div>

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
