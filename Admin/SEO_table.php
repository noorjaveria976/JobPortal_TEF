<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SEO Pages</title>
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
            <h4 class="mb-2">Manage SEO Pages</h4>

            <a href="SEO_form.php" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Add New SEO</a>

            <div class="card shadow-sm">
              <div class="card-header bg-primary text-white">
                <i class="fas fa-table"></i> SEO Pages List
              </div>
              <div class="card-body table-responsive">
                <table class="table table-striped" id="tableExport">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Page Name</th>
                      <th>Meta Title</th>
                      <th>Keywords</th>
                      <th>Last Updated</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $res = $conn->query("SELECT * FROM seo_pages ORDER BY id DESC");
                    $count = 1;
                    while ($row = $res->fetch_assoc()):
                    ?>
                      <tr>
                        <td><?= $count++ ?></td>
                        <td><?= htmlspecialchars($row['page_name']) ?></td>
                        <td><?= htmlspecialchars($row['meta_title']) ?></td>
                        <td><?= htmlspecialchars($row['keywords']) ?></td>
                        <td><?= $row['last_updated'] ?></td>
                        <td>
                          <div class="dropdown d-inline">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                              Action
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="SEO_form.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit</a>
                              <a href="javascript:void(0);"
                                class="dropdown-item delete-btn"
                                data-id="<?= $row['id'] ?>">
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
        </section>
      </div>
      <?php include('includes/footer.php'); ?>
    </div>
  </div>
<script>
document.querySelectorAll('.delete-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    let id = this.getAttribute('data-id');

    Swal.fire({
      title: 'Are you sure?',
      text: "This action cannot be undone!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "seo_delete.php?id=" + id;
      }
    });
  });
});
</script>

  <script src="assets/js/page/datatables.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    <?php if (isset($_SESSION['success'])): ?>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?= $_SESSION['success'] ?>'
      });
      <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
  </script>
</body>

</html>