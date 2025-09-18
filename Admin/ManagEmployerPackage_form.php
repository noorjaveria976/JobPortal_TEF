<?php
session_start();
include "config/db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$editData = null;

if ($id > 0) {
  $result = $conn->query("SELECT * FROM employer_packages WHERE id=$id");
  $editData = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add / Edit Employer Package</title>
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
          <div class="row">
            <div class="col-12">

              <div class="container mt-4">
                <div class="card shadow-sm card-primary rounded-3">
                  <div class="card-header d-flex align-items-center ">
                    <i class="fas fa-plus-circle me-2"></i>
                    <h5 class="mb-0"><?= $editData ? "Edit" : "Add" ?> Employer Package</h5>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="includes/saveEmployerPackage.php">
                      <?php if ($editData): ?>
                        <input type="hidden" name="id" value="<?= $editData['id'] ?>">
                      <?php endif; ?>

                      <div class="mb-3">
                        <label class="form-label">Package Name</label>
                        <input type="text" name="package_name" class="form-control"
                               value="<?= $editData['package_name'] ?? '' ?>" required>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Number of Job Posts</label>
                        <input type="number" name="job_posts" class="form-control"
                               value="<?= $editData['job_posts'] ?? '' ?>" required>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Duration</label>
                        <select name="duration" class="form-control">
                          <option value="12 Days" <?= ($editData && $editData['duration']=="12 Days")?'selected':'' ?>>12 Days</option>
                          <option value="32 Days" <?= ($editData && $editData['duration']=="32 Days")?'selected':'' ?>>32 Days</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control"
                               value="<?= $editData['price'] ?? '' ?>" required>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Features</label><br>
                        <input type="checkbox" name="highlight" value="1" <?= ($editData && $editData['highlight'])?'checked':'' ?>> Highlight Job Posts<br>
                        <input type="checkbox" name="urgent" value="1" <?= ($editData && $editData['urgent'])?'checked':'' ?>> Urgent Tag<br>
                        <input type="checkbox" name="support" value="1" <?= ($editData && $editData['support'])?'checked':'' ?>> Premium Support
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                          <option value="Active" <?= ($editData && $editData['status']=="Active")?'selected':'' ?>>Active</option>
                          <option value="Inactive" <?= ($editData && $editData['status']=="Inactive")?'selected':'' ?>>Inactive</option>
                        </select>
                      </div>

                      <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Save</button>
                        <a href="ManageEmployerPackage.php" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Back</a>
                      </div>
                    </form>
                  </div>
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

</body>
</html>
