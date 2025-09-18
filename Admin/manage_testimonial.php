<?php
session_start();
include "config/db.php";

// Fetch all testimonials
$result = $conn->query("SELECT * FROM testimonials ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Testimonials</title>
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
              <div class="col-12">
                <div class="container">
                  <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                      <div><i class="fas fa-database"></i> Testimonials List</div>
                      <a href="Testimonial_form.php" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Add New Testimonial
                      </a>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-striped" id="tableExport">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Image</th>
                              <th>Review</th>
                              <th>Date</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php while($row = $result->fetch_assoc()): ?>
                              <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= htmlspecialchars($row['name']); ?></td>
                                <td>
                                  <?php if(!empty($row['image'])): ?>
                                    <img src="uploads/testimonials/<?= $row['image']; ?>" width="50" class="rounded-circle">
                                  <?php else: ?>
                                    <img src="assets/img/blog/blankProfilePhoto.png" width="50" class="rounded-circle">
                                  <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($row['review']); ?></td>
                                <td><?= $row['review_date']; ?></td>
                                <td>
                                  <div class="dropdown d-inline">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                      Action
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item has-icon" href="Testimonial_edit.php?id=<?= $row['id']; ?>">
                                        <i class="fas fa-edit"></i> Edit
                                      </a>
                                      <a class="dropdown-item has-icon delete-btn" href="includes/testimonial_delete.php?id=<?= $row['id']; ?>">
                                        <i class="fas fa-trash"></i> Delete
                                      </a>
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
            </div>
          </div>
        </section>
        <?php include('includes/footer.php'); ?>
      </div>
    </div>
  </div>

  <script src="assets/js/page/datatables.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    // SweetAlert for session messages (success on add/update)
    <?php if (isset($_SESSION['success'])): ?>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?= $_SESSION['success'] ?>'
      });
      <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    // SweetAlert confirmation for delete
    document.querySelectorAll('.delete-btn').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        const url = this.href;
        Swal.fire({
          title: 'Are you sure?',
          text: "This testimonial will be deleted!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = url;
          }
        })
      });
    });
  </script>
</body>
</html>
