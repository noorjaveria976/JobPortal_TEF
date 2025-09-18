<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Testimonial</title>
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
                  <div class="card shadow-sm card-primary">
                    <div class="card-header h5 ">
                      <i class="fas fa-edit"></i> Add New Testimonial
                    </div>
                    <div class="card-body">
                      <form action="includes/testimonial_save.php" method="POST" enctype="multipart/form-data">
                        
                        <!-- Name -->
                        <div class="mb-3">
                          <label class="form-label"><i class="fas fa-user"></i> Name</label>
                          <input type="text" name="name" class="form-control" required>
                        </div>

                        <!-- Image -->
                        <div class="mb-3">
                          <label class="form-label"><i class="fas fa-image"></i> Client Image</label>
                          <input type="file" name="image" class="form-control" accept="image/*">
                          <div class="form-text">Allowed formats: JPG, PNG, GIF</div>
                        </div>

                        <!-- Review -->
                        <div class="mb-3">
                          <label class="form-label"><i class="fas fa-comment"></i> Review</label>
                          <textarea name="review" class="form-control" rows="4" required></textarea>
                        </div>

                        <!-- Date -->
                        <div class="mb-3">
                          <label class="form-label"><i class="fas fa-calendar-alt"></i> Date</label>
                          <input type="date" name="review_date" class="form-control" required>
                        </div>

                        <!-- Buttons -->
                        <button type="submit" name="save" class="btn btn-success">
                          <i class="fas fa-save"></i> Save
                        </button>
                        <button type="reset" class="btn btn-secondary">
                          <i class="fas fa-undo"></i> Reset
                        </button>

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
