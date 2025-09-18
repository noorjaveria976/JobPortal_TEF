<?php
session_start();
include "config/db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$industry_name = "";
$industry_desc = "";
$status = 1;

if ($id > 0) {
    $stmt = $conn->prepare("SELECT * FROM industries WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $industry_name = $row['industry_name'];
        $industry_desc = $row['industry_desc'];
        $status = $row['status'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $id ? "Edit" : "Add New" ?> Industry</title>
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
<div class="row justify-content-center">
<div class="col-lg-9">
<div class="card card-primary">
<div class="card-header  d-flex justify-content-between">
<h5 class="mb-0"><?= $id ? "Edit" : "Add New" ?> Industry</h5>
<a href="Industry.php" class="btn btn-sm btn-light"><i class="fas fa-list"></i> View All</a>
</div>
<div class="card-body">
<form action="includes/save-industry.php" method="POST">
<input type="hidden" name="id" value="<?= $id ?>">
<div class="mb-3">
<label class="form-label">Industry Name</label>
<input type="text" class="form-control" name="industry_name" placeholder="e.g. IT, HR" required value="<?= htmlspecialchars($industry_name) ?>">
</div>
<div class="mb-3">
<label class="form-label">Description</label>
<textarea class="form-control" name="industry_desc" rows="3" placeholder="Short description"><?= htmlspecialchars($industry_desc) ?></textarea>
</div>
<div class="mb-3">
<label class="form-label">Status</label>
<select class="form-control" name="status" required>
<option value="1" <?= $status==1?"selected":"" ?>>Active</option>
<option value="0" <?= $status==0?"selected":"" ?>>Inactive</option>
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
