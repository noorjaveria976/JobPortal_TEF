<?php
session_start();
include "config/db.php";

// Agar id na mile to redirect
if (!isset($_GET['id'])) {
    header("Location: manage_testimonial.php");
    exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM testimonials WHERE id=$id");
if ($result->num_rows == 0) {
    $_SESSION['error'] = "Testimonial not found!";
    header("Location: manage_testimonial.php");
    exit;
}
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Testimonial</title>
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
            <div class="row">
              <div class="col-12">
                <div class="container ">
                  <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                      <i class="fas fa-edit"></i> Edit Testimonial
                    </div>
                    <div class="card-body">
                      <form action="includes/testimonial_save.php" method="POST" enctype="multipart/form-data">
                        
                        <!-- Hidden ID -->
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">

                        <!-- Name -->
                        <div class="mb-3">
                          <label class="form-label"><i class="fas fa-user"></i> Name</label>
                          <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']); ?>" required>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                          <label class="form-label"><i class="fas fa-image"></i> Client Image</label>
                          <div class="mb-2">
                            <?php if($row['image']): ?>
                              <img src="uploads/testimonials/<?= $row['image']; ?>" width="120" class="img-thumbnail">
                            <?php else: ?>
                              <img src="assets/img/blog/blankProfilePhoto.png" width="120" class="img-thumbnail">
                            <?php endif; ?>
                          </div>
                          <input type="file" name="image" class="form-control" accept="image/*">
                          <div class="form-text">Leave blank if you don't want to change</div>
                        </div>

                        <!-- Review -->
                        <div class="mb-3">
                          <label class="form-label"><i class="fas fa-comment"></i> Review</label>
                          <textarea name="review" class="form-control" rows="4" required><?= htmlspecialchars($row['review']); ?></textarea>
                        </div>

                        <!-- Date -->
                        <div class="mb-3">
                          <label class="form-label"><i class="fas fa-calendar-alt"></i> Date</label>
                          <input type="date" name="review_date" class="form-control" value="<?= $row['review_date']; ?>" required>
                        </div>

                        <!-- Buttons -->
                        <button type="submit" name="update" class="btn btn-primary">
                          <i class="fas fa-save"></i> Update
                        </button>
                        <a href="manage_testimonial.php" class="btn btn-secondary">
                          <i class="fas fa-arrow-left"></i> Back
                        </a>

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
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
