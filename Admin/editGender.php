<?php
session_start();
include "config/db.php";

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM genders WHERE id=$id");
$data = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $gender_name = $_POST['gender_name'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE genders SET gender_name=?, status=? WHERE id=?");
    $stmt->bind_param("sii", $gender_name, $status, $id);
    $stmt->execute();

    $_SESSION['success'] = "Gender updated successfully!";
    header("Location: Gender.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Gender</title>
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
                        <div class="card shadow-lg card-primary">
                            <div class="card-header h5">
                                <i class="fas fa-edit me-2"></i> Edit Gender
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Gender Name</label>
                                        <input type="text" class="form-control" name="gender_name" value="<?= htmlspecialchars($data['gender_name']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="1" <?= $data['status']==1?'selected':'' ?>>Active</option>
                                            <option value="0" <?= $data['status']==0?'selected':'' ?>>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-secondary me-2"style="margin-right: 10px;"><i class="fas fa-undo"></i> Reset</button>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
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
