<?php
session_start();
include "config/db.php";

// Default values
$blog = [
    'id'=>'',
    'title'=>'',
    'content'=>'',
    'image'=>'',
    'blog_date'=>date('Y-m-d')
];

// Edit mode
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT * FROM blogs WHERE id=$id");
    if($res->num_rows>0){
        $blog = $res->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?= $blog['id'] ? 'Edit Blog' : 'Add Blog' ?></title>
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
<div class="card  card-primary shadow-sm">
<div class="card-header h5 "><?= $blog['id'] ? 'Edit Blog' : 'Add Blog' ?></div>
<div class="card-body">
<form method="POST" action="blog_save.php" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $blog['id'] ?>">

<div class="mb-3">
<label>Title</label>
<input type="text" name="title" class="form-control" value="<?= $blog['title'] ?>" required>
</div>

<div class="mb-3">
<label>Content</label>
<textarea name="content" class="form-control" rows="5" required><?= $blog['content'] ?></textarea>
</div>

<div class="mb-3">
<label>Image</label>
<input type="file" name="image" class="form-control">
<?php if($blog['image']): ?>
<img src="<?= $blog['image'] ?>" style="max-width:150px;" class="mt-2">
<?php endif; ?>
</div>

<div class="mb-3">
<label>Date</label>
<input type="date" name="blog_date" class="form-control" value="<?= $blog['blog_date'] ?>" required>
</div>

<button type="submit" class="btn btn-success"><?= $blog['id'] ? 'Update' : 'Add' ?> Blog</button>
<a href="Blog_table.php" class="btn btn-secondary">Cancel</a>
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
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
