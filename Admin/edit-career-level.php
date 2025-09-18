<?php
session_start();
include "config/db.php";

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM career_levels WHERE id=$id");
$data = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $language = $_POST['language'];
    $career_level = $_POST['career_level'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE career_levels SET language=?, career_level=?, status=? WHERE id=?");
    $stmt->bind_param("sssi",$language,$career_level,$status,$id);
    $stmt->execute();

    $_SESSION['success']="Career Level updated successfully!";
    header("Location: CareerLevel.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Career Level</title>
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
                                <div class="card-header  d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><i class="fas fa-user-tie me-2"></i> Edit Career Level</h5>
                                    <a href="CareerLevel.php" class="btn btn-sm btn-light"><i class="fas fa-list"></i> View All</a>
                                </div>
                                <div class="card-body p-4">
                                    <form method="POST">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label>Select Language</label>
                                                <select class="form-control" name="language" required>
                                                    <option value="English" <?= $data['language']=='English'?'selected':'' ?>>English</option>
                                                    <option value="Urdu" <?= $data['language']=='Urdu'?'selected':'' ?>>Urdu</option>
                                                    <option value="French" <?= $data['language']=='French'?'selected':'' ?>>French</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Career Level</label>
                                                <input type="text" class="form-control" name="career_level" value="<?= htmlspecialchars($data['career_level']) ?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Status</label>
                                                <select class="form-control" name="status" required>
                                                    <option value="Active" <?= $data['status']=='Active'?'selected':'' ?>>Active</option>
                                                    <option value="Inactive" <?= $data['status']=='Inactive'?'selected':'' ?>>Inactive</option>
                                                    <option value="Pending" <?= $data['status']=='Pending'?'selected':'' ?>>Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="reset" class="btn btn-outline-secondary me-2"><i class="fas fa-undo"></i> Reset</button>
                                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update Career Level</button>
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
