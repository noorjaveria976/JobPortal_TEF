<?php
session_start();
include "config/db.php";

// Check if editing
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$job_type = $description = "";
$status = 1;

if($id){
    $result = $conn->query("SELECT * FROM job_types WHERE id=$id LIMIT 1");
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $job_type = $row['job_type'];
        $description = $row['description'];
        $status = $row['status'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $id ? "Edit Job Type" : "Add New Job Type"; ?></title>
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
                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <div class="card card-primary">
                                        <div class="card-header h5">
                                            <h5 class="mb-0"><i class="fas fa-briefcase me-2"></i> 
                                                <?php echo $id ? "Edit Job Type" : "Add New Job Type"; ?>
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="includes/save-jobType.php" method="post">
                                                <!-- Hidden ID for edit -->
                                                <?php if($id): ?>
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <?php endif; ?>

                                                <!-- Job Type Name -->
                                                <div class="mb-3">
                                                    <label for="jobTypeName" class="form-label">Job Type Name</label>
                                                    <input type="text" class="form-control" id="jobTypeName" 
                                                        name="job_type" placeholder="Enter Job Type (e.g., Full-Time)"
                                                        value="<?php echo htmlspecialchars($job_type); ?>" required>
                                                </div>

                                                <!-- Description -->
                                                <div class="mb-3">
                                                    <label for="jobTypeDesc" class="form-label">Description</label>
                                                    <textarea class="form-control" id="jobTypeDesc" name="description" rows="3"
                                                        placeholder="Write a short description..."><?php echo htmlspecialchars($description); ?></textarea>
                                                </div>

                                                <!-- Status -->
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control" name="status" required>
                                                        <option value="1" <?php echo $status==1 ? 'selected':''; ?>>Active</option>
                                                        <option value="0" <?php echo $status==0 ? 'selected':''; ?>>Inactive</option>
                                                    </select>
                                                </div>

                                                <!-- Buttons -->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset" class="btn btn-secondary me-2" style="margin-right: 10px;">Reset</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">
                                                        <?php echo $id ? "Update" : "Add"; ?>
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
