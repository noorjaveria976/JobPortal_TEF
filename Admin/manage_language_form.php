<?php
session_start();
include "config/db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$language = $level = $status = "";
if ($id > 0) {
    $res = $conn->query("SELECT * FROM language_levels WHERE id=$id");
    if ($res->num_rows > 0) {
        $data = $res->fetch_assoc();
        $language = $data['language_code'];
        $level = $data['level'];
        $status = $data['status'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?= $id ? "Edit" : "Add New" ?> Language Level</title>
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

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-8 offset-md-2">
                <div class="card shadow-sm card-primary">
                  <div class="card-header h5">
                 <?= $id ? "Edit" : "Add New" ?> Language Level
                  </div>
                  <div class="card-body">
                    <form action="includes/save_language_level.php" method="POST">
                      <input type="hidden" name="id" value="<?= $id ?>">

                      <div class="mb-3">
                        <label class="form-label">Language</label>
                        <input type="text" class="form-control" name="language" required value="<?= $language ?>">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Level</label>
                        <input type="text" class="form-control" name="level" required value="<?= $level ?>">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status" required>
                          <option value="1" <?= $status == 1 ? "selected" : "" ?>>Active</option>
                          <option value="0" <?= $status == 0 ? "selected" : "" ?>>Inactive</option>
                        </select>
                      </div>

                      <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save
                      </button>
                      <a href="ListLanguageLevel.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                      </a>
                    </form>
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

  <!-- JS Assets -->
  <script src="assets/js/page/datatables.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
