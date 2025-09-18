<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Companies</title>
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
          <div class="card shadow-sm mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0"><i class="bi bi-building"></i> Manage Companies</h5>
              <a href="managecompanyForm.php" class="btn btn-primary btn-sm">+ Add Company</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Logo</th>
                      <th>Company Name</th>
                      <th>Industry</th>
                      <th>Contact Person</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $res = $conn->query("SELECT * FROM companies ORDER BY id DESC");
                  $i=1;
                  while($row=$res->fetch_assoc()):
                      // Set logo path or placeholder
                      $logoPath = !empty($row['logo']) && file_exists("uploads/".$row['logo']) 
                                  ? "uploads/".$row['logo'] 
                                  : "assets/images/default-logo.png"; // You can put a default logo in this path
                  ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><img src="<?= $logoPath ?>" width="50" height="50" style="object-fit:cover;border-radius:5px;"></td>
                      <td><?= htmlspecialchars($row['name']) ?></td>
                      <td><?= htmlspecialchars($row['industry']) ?></td>
                      <td><?= htmlspecialchars($row['contact_person']) ?></td>
                      <td><?= htmlspecialchars($row['email']) ?></td>
                      <td><?= htmlspecialchars($row['phone']) ?></td>
                      <td>
                        <?php
                          $statusClass = 'bg-secondary';
                          if($row['status']=='Active') $statusClass='bg-success';
                          elseif($row['status']=='Inactive') $statusClass='bg-danger';
                          elseif($row['status']=='Pending') $statusClass='bg-warning';
                        ?>
                        <span class="badge <?= $statusClass ?> text-white"><?= htmlspecialchars($row['status']) ?></span>
                      </td>
                      <td>
                        <div class='dropdown'>
                          <button class='btn btn-primary dropdown-toggle btn-sm' type='button' data-bs-toggle='dropdown'>Action</button>
                          <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='managecompanyForm.php?id=<?= $row['id'] ?>'><i class='fas fa-edit'></i> Edit</a></li>
                            <li><a class='dropdown-item delete-btn' href='#' data-id='<?= $row['id'] ?>'><i class='fas fa-trash'></i> Delete</a></li>
                            <li><a class='dropdown-item status-btn' href='#' data-id='<?= $row['id'] ?>' data-status='<?= $row['status'] ?>'><i class='fas fa-check-circle'></i> Change Company Status</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  <?php
                    $i++;
                  endwhile;
                  ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>

<script>
  // Delete company
  document.querySelectorAll('.delete-btn').forEach(btn=>{
    btn.addEventListener('click', function(e){
      e.preventDefault();
      let id = this.dataset.id;
      Swal.fire({
        title:'Are you sure?',
        text:'This company will be deleted!',
        icon:'warning',
        showCancelButton:true,
        confirmButtonText:'Yes, delete it!'
      }).then((result)=>{
        if(result.isConfirmed){
          window.location.href='includes/company_delete.php?id='+id;
        }
      });
    });
  });

  // Toggle status
  document.querySelectorAll('.status-btn').forEach(btn=>{
    btn.addEventListener('click', function(e){
      e.preventDefault();
      let id = this.dataset.id;
      Swal.fire({
        title:'Change Status?',
        text:'Do you want to change company status?',
        icon:'question',
        showCancelButton:true,
        confirmButtonText:'Yes, change it!'
      }).then((result)=>{
        if(result.isConfirmed){
          window.location.href='includes/company_toggle_status.php?id='+id;
        }
      });
    });
  });

  // SweetAlert for Add/Edit
  <?php if(isset($_SESSION['success'])): ?>
    Swal.fire({
      icon:'success',
      title:'Success',
      text:'<?= $_SESSION['success'] ?>',
      timer:2000,
      showConfirmButton:false
    });
    <?php unset($_SESSION['success']); ?>
  <?php endif; ?>
</script>
</body>
</html>
