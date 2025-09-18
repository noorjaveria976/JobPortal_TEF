<?php
session_start();
include "config/db.php";

$lang = ['id'=>'','language_name'=>'','language_code'=>'','flag'=>'','status'=>'Active'];

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT * FROM site_languages WHERE id=$id");
    if($res->num_rows>0){
        $lang = $res->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $lang['id']?'Edit Language':'Add Language' ?></title>
<link rel="stylesheet" href="assets/css/app.min.css">
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
<div class="row">
<div class="col-12">
<div class="card shadow-sm card-primary">
<div class="card-header h5"><?= $lang['id']?'Edit Language':'Add Language' ?></div>
<div class="card-body">
<form method="POST" action="site_language_save.php" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $lang['id'] ?>">

<div class="mb-3">
<label>Language Name</label>
<input type="text" name="language_name" class="form-control" required value="<?= $lang['language_name'] ?>">
</div>

<div class="mb-3">
<label>Language Code</label>
<input type="text" name="language_code" class="form-control" required value="<?= $lang['language_code'] ?>">
</div>

<div class="mb-3">
<label>Flag Image</label>
<?php if($lang['flag']): ?>
<img src="<?= $lang['flag'] ?>" width="80" class="d-block mb-2">
<?php endif; ?>
<input type="file" name="flag_image" class="form-control">
</div>

<div class="mb-3">
<label>Status</label>
<select name="status" class="form-control">
<option value="Active" <?= $lang['status']=='Active'?'selected':'' ?>>Active</option>
<option value="Inactive" <?= $lang['status']=='Inactive'?'selected':'' ?>>Inactive</option>
</select>
</div>

<button type="submit" class="btn btn-success"><?= $lang['id']?'Update':'Add' ?> Language</button>
<a href="./manage_site_langauge.php" class="btn btn-secondary">Cancel</a>
</form>
</div>
</div>
</div>
</div>
</section>
</div>

<?php include('includes/footer.php'); ?>
</div>
</div>
<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>

</html>
