<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Manage Admins</title>

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
                                <!-- Font Awesome CSS (head me include karein) -->

                                <div class="card mt-3 shadow-sm border-0 rounded-3">
                                    <div class="card-header  text-black d-flex align-items-center">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <h5 class="mb-0">States</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover align-middle" id="tableExport">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th><i class="fas fa-map me-1 text-success"></i> State Name</th>
                                                    <th><i class="fas fa-flag me-1 text-primary"></i> Country</th>
                                                    <th><i class="fas fa-toggle-on me-1 text-warning"></i> Status</th>
                                                    <th><i class="fas fa-cog me-1"></i> Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Sindh</td>
                                                    <td>Pakistan</td>
                                                    <td>
                                                        <span class="badge bg-success">
                                                            <i class="fas fa-check"></i> Active
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown d-inline">
                                                            <button class="btn btn-primary dropdown-toggle"
                                                                type="button" id="dropdownMenuButton2"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item has-icon" href="#"> <i
                                                                        class="fas fa-edit"></i>Edit</a>
                                                                <a class="dropdown-item has-icon" href="#"> <i
                                                                        class="fas fa-trash"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
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
    document.addEventListener("DOMContentLoaded", function() {
      // Delete Confirmation
      document.querySelectorAll(".delete-btn").forEach(function(button) {
        button.addEventListener("click", function(e) {
          e.preventDefault();
          const url = this.getAttribute("href");
          const isLast = this.getAttribute("data-last");

          if (isLast === "true") {
            Swal.fire({
              title: "Not Allowed!",
              text: "You cannot delete the last remaining admin!",
              icon: "error",
              confirmButtonText: "OK"
            });
            return;
          }

          Swal.fire({
            title: "Are you sure?",
            text: "This admin will be deleted!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = url;
            }
          });
        });
      });

      // Status Change Confirmation
      document.querySelectorAll(".status-btn").forEach(function(button) {
        button.addEventListener("click", function(e) {
          e.preventDefault();
          const url = this.getAttribute("href");
          const status = this.getAttribute("data-status");
          const isLast = this.getAttribute("data-last");

          if (isLast === "true" && status === "Active") {
            Swal.fire({
              title: "Not Allowed!",
              text: "You cannot inactivate the last remaining admin!",
              icon: "error",
              confirmButtonText: "OK"
            });
            return;
          }

          Swal.fire({
            title: "Change Status?",
            text: "Do you want to change status from " + status + "?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Yes, change it!"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = url;
            }
          });
        });
      });
    });
  </script>

  <script src="assets/js/page/datatables.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>