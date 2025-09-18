<?php
session_start();
include "config/db.php";

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM functional_areas WHERE id=$id");
$data = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $functional_area = $_POST['functional_area'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE functional_areas SET functional_area=?, status=? WHERE id=?");
    $stmt->bind_param("ssi", $functional_area, $status, $id);
    $stmt->execute();

    $_SESSION['success'] = "Functional Area updated successfully!";
    header("Location: FunctionalAreas.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Functional Area</title>
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
<div class="card-header  d-flex justify-content-between">
<h5 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Functional Area</h5>
<a href="FunctionalAreas.php" class="btn btn-sm btn-light"><i class="fas fa-list"></i> View All</a>
</div>
<div class="card-body p-4">
<form method="POST">
<div class="row g-3">
<div class="col-md-6">
<label>Functional Area</label>
<input type="text" class="form-control" name="functional_area" value="<?= htmlspecialchars($data['functional_area']) ?>" required>
</div>
<div class="col-md-6">
<label>Status</label>
<select class="form-control" name="status" required>
<option value="Active" <?= $data['status']=='Active'?'selected':'' ?>>Active</option>
<option value="Inactive" <?= $data['status']=='Inactive'?'selected':'' ?>>Inactive</option>
</select>
</div>
</div>
<div class="d-flex justify-content-end mt-4">
<button type="reset" class="btn btn-outline-secondary me-2" style="margin-right: 10px;"><i class="fas fa-undo"></i> Reset</button>
<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
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
</body>
</html>
