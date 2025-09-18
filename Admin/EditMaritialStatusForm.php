<?php
session_start();
include "config/db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$status_name = '';
$description = '';
$status = 1;

if($id > 0){
    $query = $conn->query("SELECT * FROM marital_status WHERE id=$id");
    if($query->num_rows > 0){
        $row = $query->fetch_assoc();
        $status_name = $row['status_name'];
        $description = $row['description'];
        $status = $row['status'];
    } else {
        $_SESSION['success'] = "Marital status not found!";
        header("Location: MaritalStatus.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $id ? 'Edit' : 'Add'; ?> Marital Status</title>
<?php include('includes/source.html'); ?>
</head>
<body>
<div id="app">
<div class="main-wrapper main-wrapper-1">
<?php include('includes/navbar.php'); ?>
<?php include('includes/sidebar.html'); ?>

<div class="main-content">
<section class="section">
<div class="card shadow-sm border-0 rounded-3">
<div class="card-header bg-info text-white">
<i class="fas fa-heart me-2"></i> <?php echo $id ? 'Edit' : 'Add'; ?> Marital Status
<a href="MaritalStatus.php" class="btn btn-light btn-sm float-end"><i class="fas fa-arrow-left"></i> Back</a>
</div>
<div class="card-body">
<form action="includes/SaveMaritalStatus.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<div class="mb-3">
<label>Marital Status Name</label>
<input type="text" name="status_name" class="form-control" value="<?php echo htmlspecialchars($status_name); ?>" required>
</div>
<div class="mb-3">
<label>Description</label>
<textarea name="description" class="form-control" rows="3"><?php echo htmlspecialchars($description); ?></textarea>
</div>
<div class="mb-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="1" <?php echo $status==1?'selected':''; ?>>Active</option>
<option value="0" <?php echo $status==0?'selected':''; ?>>Inactive</option>
</select>
</div>
<button type="submit" name="submit" class="btn btn-success"><?php echo $id ? 'Update' : 'Save'; ?></button>
</form>
</div>
</div>
</section>
<?php include('includes/footer.php'); ?>
</div>
</div>
</div>
</body>
</html>
