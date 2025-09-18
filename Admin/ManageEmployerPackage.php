<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Employer Packages</title>
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
          <div class="row">
            <div class="col-12">

              <div class="container mt-4">
                <div class="card shadow-sm border-0 rounded-3">
                  <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-briefcase me-2"></i><strong>Manage Employer Packages</strong></div>
                    <a href="ManagEmployerPackage_form.php">
                      <button class="btn btn-success btn-sm">
                        <i class="fas fa-plus-circle me-1"></i> Add Package
                      </button>
                    </a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead class="table-light">
                          <tr>
                            <th>#</th>
                            <th>Package Name</th>
                            <th>Job Posts</th>
                            <th>Duration</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $result = $conn->query("SELECT * FROM employer_packages ORDER BY id DESC");
                          $i = 1;
                          while ($row = $result->fetch_assoc()):
                          ?>
                          <tr>
                            <td><?= $i++ ?></td>
                            <td><?= htmlspecialchars($row['package_name']) ?></td>
                            <td><?= $row['job_posts'] ?></td>
                            <td><?= $row['duration'] ?></td>
                            <td>$<?= $row['price'] ?></td>
                            <td>
                              <?php if ($row['status'] == 'Active'): ?>
                                <span class="badge bg-success"><i class="fas fa-check-circle"></i> Active</span>
                              <?php else: ?>
                                <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Inactive</span>
                              <?php endif; ?>
                            </td>
                            <td>
                              <div class="dropdown d-inline">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                  Action
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="ManagEmployerPackage_form.php?id=<?= $row['id'] ?>">
                                    <i class="fas fa-edit"></i> Edit
                                  </a>
                                  <a class="dropdown-item has-icon delete-btn" href="includes/deleteEmployerPackage.php?id=<?= $row['id'] ?>">
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
    </div>
    <?php include('includes/footer.php'); ?>
  </div>
</div>

<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
<script>
  document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const url = this.href;
      Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
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
    })
  });

  <?php if (isset($_SESSION['success'])): ?>
  Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '<?= $_SESSION['success'] ?>'
  });
  <?php unset($_SESSION['success']); endif; ?>
</script>
</body>
</html>
