<?php
session_start();
include "config/db.php";

if (!isset($_GET['id'])) {
    header("Location: manageJobs.php");
    exit();
}

$id = $_GET['id'];

// Fetch job
$stmt = $conn->prepare("SELECT * FROM jobs WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$job = $result->fetch_assoc();

// Handle form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $company = $_POST['company'];
    $city = $_POST['city'];
    $department = $_POST['department'];
    $status = $_POST['status'];

    $update = $conn->prepare("UPDATE jobs SET title=?, company=?, city=?, department=?, status=? WHERE id=?");
    $update->bind_param("sssssi", $title, $company, $city, $department, $status, $id);

    if ($update->execute()) {
        $_SESSION['success'] = "Job updated successfully!";
        header("Location: manageJobs.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Job</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include('includes/source.html'); ?>
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <?php include('includes/navbar.php'); ?>
        <?php include('includes/sidebar.html'); ?>
        <div class="main-content">
            <section class="section">
                <div class="card card-primary">
                    <div class="card-header ">
                        <h4>Edit Job</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Job Title</label>
                                    <input type="text" name="title" class="form-control" value="<?= $job['title'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Company</label>
                                    <input type="text" name="company" class="form-control" value="<?= $job['company'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control" value="<?= $job['city'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Department</label>
                                    <select name="department" class="form-control" required>
                                        <option value="IT" <?= $job['department']=='IT'?'selected':'' ?>>IT</option>
                                        <option value="HR" <?= $job['department']=='HR'?'selected':'' ?>>HR</option>
                                        <option value="Marketing" <?= $job['department']=='Marketing'?'selected':'' ?>>Marketing</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Active" <?= $job['status']=='Active'?'selected':'' ?>>Active</option>
                                        <option value="Inactive" <?= $job['status']=='Inactive'?'selected':'' ?>>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-success">Update Job</button>
                                    <a href="manageJobs.php" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <?php include('includes/footer.php'); ?>
        </div>
    </div>
</div>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
