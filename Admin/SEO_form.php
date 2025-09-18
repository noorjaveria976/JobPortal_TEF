<?php
session_start();
include "config/db.php";

// Default SEO
$seo = [
    'id'=>'',
    'page_name'=>'',
    'meta_title'=>'',
    'meta_description'=>'',
    'keywords'=>'',
    'slug'=>''
];

// Edit mode
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT * FROM seo_pages WHERE id=$id");
    if($res->num_rows > 0){
        $seo = $res->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $seo['id'] ? 'Edit SEO' : 'Add SEO' ?></title>
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
        <div class="section-body">

          <div class="card shadow-sm card-primary">
            <div class="card-header h5">
              <i class="fas fa-pen"></i> <?= $seo['id'] ? 'Edit' : 'Add' ?> SEO
            </div>
            <div class="card-body">
              <form method="POST" action="seo_save.php">
                <input type="hidden" name="id" value="<?= $seo['id'] ?>">

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label>Page Name</label>
                    <input type="text" class="form-control" name="page_name" value="<?= htmlspecialchars($seo['page_name']) ?>" required>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug" value="<?= htmlspecialchars($seo['slug']) ?>" placeholder="e.g. about-us" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="<?= htmlspecialchars($seo['meta_title']) ?>" required>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label>Meta Keywords</label>
                    <input type="text" class="form-control" name="keywords" value="<?= htmlspecialchars($seo['keywords']) ?>" placeholder="comma separated">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-3">
                    <label>Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3"><?= htmlspecialchars($seo['meta_description']) ?></textarea>
                  </div>
                </div>

                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary " style="margin-right:10px;"><?= $seo['id'] ? 'Update' : 'Save' ?></button>
                  <a href="SEO_table.php" class="btn btn-secondary ms-2">Cancel</a>
                </div>

              </form>
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
