<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Site Languages</title>
<link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
<div class="card shadow-sm">
<div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
<div><i class="fas fa-language"></i> Site Languages</div>
<a href="site_language_form.php" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add New Language</a>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped" id="tableExport">
<thead>
<tr>
<th>ID</th>
<th>Flag</th>
<th>Language</th>
<th>Code</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php
$res = $conn->query("SELECT * FROM site_languages ORDER BY id DESC");
while ($row = $res->fetch_assoc()):
?>
<tr>
<td><?= $row['id'] ?></td>
<td><?php if ($row['flag']): ?><img src="<?= $row['flag'] ?>" width="40"><?php endif; ?></td>
<td><?= htmlspecialchars($row['language_name']) ?></td>
<td><?= htmlspecialchars($row['language_code']) ?></td>
<td>
<span class="badge <?= strtolower($row['status'])=='active'?'bg-success':'bg-secondary' ?> text-white"><?= $row['status'] ?></span>
</td>
<td>
<div class="dropdown d-inline">
<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="site_language_form.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit</a>
<a class="dropdown-item delete-btn" href="site_language_delete.php?id=<?= $row['id'] ?>"><i class="fas fa-trash"></i> Delete</a>
</div>
</div>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
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

<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
<script>
document.querySelectorAll('.delete-btn').forEach(btn=>{
    btn.addEventListener('click', function(e){
        e.preventDefault();
        const url = this.href;
        Swal.fire({
            title:'Are you sure?',
            text:"You won't be able to revert this!",
            icon:'warning',
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Yes, delete it!'
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href = url;
            }
        })
    })
});

// SweetAlert for session messages
<?php if(isset($_SESSION['success'])): ?>
Swal.fire({icon:'success', title:'Success', text:'<?= $_SESSION['success'] ?>'});
<?php unset($_SESSION['success']); endif; ?>
</script>
</body>
</html>
