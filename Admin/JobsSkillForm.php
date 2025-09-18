<?php
session_start();
include "config/db.php";

// Initialize variables
$skill_name = "";
$category = "";
$status = 1;
$id = 0;

// Edit mode
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM job_skills WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $skill_name = $row['skill_name'];
        $category   = $row['category'];
        $status     = $row['status'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $id>0 ? "Edit" : "Add" ?> Job Skill</title>
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
                        <div class="card card-primary">
                            <div class="card-header h5">
                                <i class="fas fa-plus-circle me-2"></i> <?= $id>0 ? "Edit" : "Add" ?> Job Skill
                            </div>
                            <div class="card-body">
                                <form action="includes/save-job-skill.php" method="post">
                                    <input type="hidden" name="id" value="<?= $id ?>">

                                    <div class="mb-3">
                                        <label class="form-label">Skill Name</label>
                                        <input type="text" class="form-control" name="skill_name"
                                               value="<?= htmlspecialchars($skill_name) ?>" placeholder="e.g. HTML & CSS" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-control" name="category" required>
                                            <option value="Frontend" <?= $category=="Frontend" ? "selected" : "" ?>>Frontend</option>
                                            <option value="Backend" <?= $category=="Backend" ? "selected" : "" ?>>Backend</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="1" <?= $status==1 ? "selected" : "" ?>>Active</option>
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
