<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Job Shifts</title>
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
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4>Job Shifts</h4>
            <a href="JobShiftForm.php" class="btn btn-success"><i class="fa fa-plus"></i> Add New Shift</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="tableExport" class="table table-bordered table-striped">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>Shift Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = $conn->query("SELECT * FROM job_shifts ORDER BY id DESC");
                  $i = 1;
                  while($row = $result->fetch_assoc()){
                      $statusText = $row['status'] ? "Active" : "Inactive";
                      $statusClass = $row['status'] ? "bg-success" : "bg-danger";
                      echo "<tr>
                        <td>{$i}</td>
                        <td>{$row['shift_name']}</td>
                        <td><span class='badge {$statusClass} text-white'>{$statusText}</span></td>
                        <td>
                          <a href='JobShiftForm.php?id={$row['id']}' class='btn btn-info btn-sm'>Edit</a>
                          <button class='btn btn-danger btn-sm delete-btn' data-id='{$row['id']}'>Delete</button>
                        </td>
                      </tr>";
                      $i++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
      <?php include('includes/footer.php'); ?>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){
  // SweetAlert for success messages
  <?php if(isset($_SESSION['success'])): ?>
    Swal.fire({
      icon: 'success',
      title: '<?php echo $_SESSION['success']; ?>',
      showConfirmButton: false,
      timer: 2000
    });
    <?php unset($_SESSION['success']); ?>
  <?php endif; ?>

  // Delete confirmation
  document.querySelectorAll('.delete-btn').forEach(btn=>{
    btn.addEventListener('click', function(){
      let shiftId = this.dataset.id;
      Swal.fire({
        title:'Are you sure?',
        text:'This job shift will be deleted!',
        icon:'warning',
        showCancelButton:true,
        confirmButtonColor:'#d33',
        cancelButtonColor:'#3085d6',
        confirmButtonText:'Yes, delete it!'
      }).then((result)=>{
        if(result.isConfirmed){
          window.location.href = 'includes/jobShift_delete.php?id='+shiftId;
        }
      });
    });
  });

  // Initialize DataTable
  if($.fn.DataTable.isDataTable('#tableExport')) {
      $('#tableExport').DataTable().destroy();
  }
  $('#tableExport').DataTable();
});
</script>

<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
