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
                                <div class="container py-4">
                                    <div class="card shadow-sm">
                                        <div
                                            class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                                            <div>
                                                <i class="fas fa-flag"></i> Countries
                                            </div>
                                           <a href="./add_new_counteries_form.html"><button class="btn btn-success btn-sm">
                                                <i class="fas fa-plus"></i> Add New Country
                                            </button></a> 
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table-1">
                                                    <thead>
                                                        <tr>
                                                            <th><i class="fas fa-hashtag"></i> ID</th>
                                                            <th><i class="fas fa-flag"></i> Country Name</th>
                                                            <th><i class="fas fa-globe"></i> ISO Code</th>
                                                            <th><i class="fas fa-cogs"></i> Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Pakistan</td>
                                                            <td>PK</td>
                                                            <td>
                                                                 <div class="dropdown d-inline">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="#"> <i class="fas fa-edit"></i>Edit</a>
                                  <a class="dropdown-item has-icon" href="#"> <i class="fas fa-trash"></i>
                                    Delete</a>
                                </div>
                              </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>India</td>
                                                            <td>IN</td>
                                                            <td>
                                                                <div class="dropdown d-inline">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="#"> <i class="fas fa-edit"></i>Edit</a>
                                  <a class="dropdown-item has-icon" href="#"> <i class="fas fa-trash"></i>
                                    Delete</a>
                                </div>
                              </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>United States</td>
                                                            <td>US</td>
                                                            <td>
                                                                <div class="dropdown d-inline">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item has-icon" href="#"> <i class="fas fa-edit"></i>Edit</a>
                                  <a class="dropdown-item has-icon" href="#"> <i class="fas fa-trash"></i>
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
                                </div>



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