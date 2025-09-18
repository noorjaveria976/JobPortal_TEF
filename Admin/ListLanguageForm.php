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
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">

                        <div class="col-12">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-language me-2"></i> Add / Edit Language Level
        </div>
        <div class="card-body">
            <form action="save_language_level.php" method="POST" id="languageLevelForm">
                
                <!-- Select Language -->
                <div class="mb-3">
                    <label for="language" class="form-label">Language</label>
                    <select class="form-control" id="language" name="language" required>
                        <option value="">-- Select Language --</option>
                        <option value="ar">عربى</option>
                        <option value="en">English</option>
                        <option value="fr">Français</option>
                        <option value="hi">Hindi</option>
                        <option value="nl">Nederlands</option>
                        <option value="es">Español</option>
                        <option value="ur">اردو</option>
                    </select>
                </div>

                <!-- Language Level -->
                <div class="mb-3">
                    <label for="level" class="form-label">Language Level</label>
                    <input type="text" class="form-control" id="level" name="level" placeholder="e.g. Beginner, Intermediate, Fluent" required>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control  " id="status" name="status" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end ">
                    <button type="reset" class="btn btn-secondary " style="margin-right:10px;">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success  ">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </form>
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
        <?php unset($_SESSION['success']);
        endif; ?>
    </script>
</body>

</html>