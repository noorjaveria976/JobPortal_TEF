<?php
session_start();
include "config/db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$subject_name = "";
$description = "";
$status = 1;

if($id){
    $res = $conn->query("SELECT * FROM major_subjects WHERE id=$id LIMIT 1");
    if($res->num_rows){
        $row = $res->fetch_assoc();
        $subject_name = $row['subject_name'];
        $description = $row['description'];
        $status = $row['status'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $id ? "Edit Major Subject" : "Add Major Subject"; ?></title>
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
<div class="card card-primary">
<div class="card-header h5">
<h5 class="mb-0"><i class="fas fa-book me-2"></i> <?php echo $id ? "Edit Major Subject" : "Add Major Subject"; ?></h5>
</div>
<div class="card-body">
<form action="includes/save-major-subject.php" method="post">
<?php if($id): ?>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<?php endif; ?>

<div class="mb-3">
<label class="fw-bold">Subject Name</label>
<input type="text" name="subject_name" class="form-control" required value="<?php echo htmlspecialchars($subject_name); ?>">
</div>

<div class="mb-3">
<label class="fw-bold">Description</label>
<textarea name="description" class="form-control" rows="3"><?php echo htmlspecialchars($description); ?></textarea>
</div>

<div class="mb-3">
<label class="fw-bold">Status</label>
<select name="status" class="form-control">
<option value="1" <?php echo $status==1?'selected':''; ?>>Active</option>
<option value="0" <?php echo $status==0?'selected':''; ?>>Inactive</option>
</select>
</div>

<div class="d-flex justify-content-end">
<button type="reset" class="btn btn-secondary me-2"  style="margin-right: 10px;"><i class="fas fa-undo me-1"></i> Reset</button>
<button type="submit" name="submit" class="btn btn-info"><i class="fas fa-save me-1"></i> <?php echo $id ? "Update" : "Add"; ?></button>
</div>
</form>
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
