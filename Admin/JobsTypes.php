<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Job Types</title>
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
            <h4>Job Types</h4>
            <a href="jobTypeForm.php" class="btn btn-success"><i class="fa fa-plus"></i> Add New Job Type</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="tableExport" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Job Type</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $result = $conn->query("SELECT * FROM job_types ORDER BY id DESC");
                $i=1;
                while($row=$result->fetch_assoc()){
                  $statusBadge = $row['status']==1 
                                 ? '<span class="badge bg-success text-white">Active</span>'
                                 : '<span class="badge bg-danger text-white">Inactive</span>';
                  echo "<tr>
                    <td>{$i}</td>
                    <td>{$row['job_type']}</td>
                    <td>{$row['description']}</td>
                    <td>{$statusBadge}</td>
                    <td>
                      <a href='jobTypeForm.php?id={$row['id']}' class='btn btn-info btn-sm'>Edit</a>
                      <a href='includes/jobType_delete.php?id={$row['id']}' class='btn btn-danger btn-sm delete-btn'>Delete</a>
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
$(document).ready(function(){
  $('#tableExport').DataTable();

  // Delete confirmation
  $('.delete-btn').click(function(e){
    e.preventDefault();
    let url = $(this).attr('href');
    Swal.fire({
      title:'Are you sure?',
      text:'This job type will be deleted!',
      icon:'warning',
      showCancelButton:true,
      confirmButtonColor:'#d33',
      cancelButtonColor:'#3085d6',
      confirmButtonText:'Yes, delete it!'
    }).then((result)=>{
      if(result.isConfirmed){
        window.location.href = url;
      }
    });
  });

  <?php if(isset($_SESSION['success'])): ?>
    Swal.fire({
      icon: 'success',
      title: '<?php echo $_SESSION['success']; ?>',
      showConfirmButton: false,
      timer: 2000
    });
    <?php unset($_SESSION['success']); ?>
  <?php endif; ?>
});
</script>

<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
