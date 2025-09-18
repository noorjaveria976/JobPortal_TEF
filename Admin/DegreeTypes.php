<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Degree Types</title>
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
            <div class="card card-primary">
              <div class="card-header h5 d-flex justify-content-between  align-item-center">
               <span> <i class="fas fa-certificate me-2"></i> Degree Types</span>
                <a href="DegreeTypeForm.php" class="btn btn-light btn-sm float-end">
                  <i class="fas fa-plus me-1"></i> Add New
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tableExport" class="table table-bordered table-striped">
                    <thead class="table-light">
                      <tr>
                        <th>#</th>
                        <th>Degree Type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = $conn->query("SELECT * FROM degree_types ORDER BY id DESC");
                      $i = 1;
                      while ($row = $query->fetch_assoc()):
                      ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo htmlspecialchars($row['degree_type']); ?></td>
                          <td><?php echo htmlspecialchars($row['description']); ?></td>
                          <td>
                            <?php echo $row['status'] == 1 ? '<span class="badge bg-success text-white">Active</span>' : '<span class="badge bg-danger text-white">Inactive</span>'; ?>
                          </td>
                          <td>
                            <div class="dropdown d-inline">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item edit-btn" href="DegreeTypeForm.php?id=<?php echo $row['id']; ?>">
                                  <i class="fas fa-edit me-1"></i> Edit
                                </a>
                                <a class="dropdown-item delete-btn" href="#" data-id="<?php echo $row['id']; ?>">
                                  <i class="fas fa-trash me-1"></i> Delete
                                </a>
                                <a class="dropdown-item status-btn" href="#" data-id="<?php echo $row['id']; ?>" data-status="<?php echo $row['status']; ?>">
                                  <i class="fas fa-toggle-on me-1"></i> Change Status
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
        </section>
        <?php include('includes/footer.php'); ?>
      </div>
    </div>
  </div>

  <script src="assets/js/page/datatables.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    // Success message
    <?php if (isset($_SESSION['success'])): ?>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?php echo $_SESSION['success']; ?>',
        timer: 2000,
        showConfirmButton: false
      });
    <?php unset($_SESSION['success']);
    endif; ?>

    // Delete
    document.querySelectorAll(".delete-btn").forEach(btn => {
      btn.addEventListener("click", function(e) {
        e.preventDefault();
        const id = this.dataset.id;
        Swal.fire({
          title: 'Are you sure?',
          text: "This degree type will be deleted!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "includes/DeleteDegreeType.php?id=" + id;
          }
        });
      });
    });

    // Change Status
    document.querySelectorAll(".status-btn").forEach(btn => {
      btn.addEventListener("click", function(e) {
        e.preventDefault();
        const id = this.dataset.id;
        Swal.fire({
          title: 'Change Status?',
          text: "Do you want to change status?",
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, change it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "includes/ChangeDegreeTypeStatus.php?id=" + id;
          }
        });
      });
    });
  </script>
</body>

</html>