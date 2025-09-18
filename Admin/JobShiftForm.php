<?php
session_start();
include "config/db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$shift_name = "";
$status = 1;

if($id){
    $result = $conn->query("SELECT * FROM job_shifts WHERE id=$id LIMIT 1");
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $shift_name = $row['shift_name'];
        $status = $row['status'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $id ? "Edit Job Shift" : "Add New Job Shift"; ?></title>
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
                        <div class="col-lg-9 ">
                            <div class="card card-primary">
                                <div class="card-header h5">
                                    <h5 class="mb-0"><i class="fas fa-clock me-2"></i> 
                                        <?php echo $id ? "Edit Job Shift" : "Add New Job Shift"; ?>
                                    </h5>
                                </div>
                               <div class="card-body">
    <form action="includes/save-jobShift.php" method="post">
        <?php if($id): ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="fas fa-clock me-1"></i> Shift Name
            </label>
            <input type="text" name="shift_name" class="form-control" required
                   value="<?php echo htmlspecialchars($shift_name); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">
                <i class="fas fa-toggle-on me-1"></i> Status
            </label>
            <select class="form-control" name="status" required>
                <option value="1" <?php echo $status==1?'selected':''; ?>>Active</option>
                <option value="0" <?php echo $status==0?'selected':''; ?>>Inactive</option>
            </select>
        </div>

        <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary me-2" style="margin-right: 10px;">
                <i class="fas fa-undo me-1"></i> Reset
            </button>
            <button type="submit" name="submit" class="btn btn-success">
                <i class="fas fa-save me-1"></i> <?php echo $id ? "Update" : "Add"; ?>
            </button>
        </div>
    </form>
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
