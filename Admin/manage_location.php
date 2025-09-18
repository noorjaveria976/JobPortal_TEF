<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Locations</title>
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
                                <div class="card shadow-sm card-primary">
                                    <div class="card-header h5 d-flex justify-content-between align-items-center">
                                        <div><i class="fas fa-map-marker-alt"></i> Manage Locations</div>
                                        <a href="manage_location_form.php" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add New Location</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="tableExport">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Country</th>
                                                        <th>ISO Code</th>
                                                        <th>State</th>
                                                        <th>City</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // ✅ Correct table name
                                                    $res = $conn->query("SELECT * FROM manage_location ORDER BY id DESC");
                                                    while ($row = $res->fetch_assoc()):
                                                    ?>
                                                        <tr>
                                                            <td><?= $row['id'] ?></td>
                                                            <td><?= htmlspecialchars($row['country']) ?></td>
                                                            <td><?= htmlspecialchars($row['iso_code']) ?></td>
                                                            <td><?= htmlspecialchars($row['state']) ?></td>
                                                            <td><?= htmlspecialchars($row['city']) ?></td>
                                                            <td><?= htmlspecialchars($row['status']) ?></td>
                                                            <td>
                                                                <div class="dropdown d-inline">
                                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="manage_location_form.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i> Edit</a>
                                                                        <a class="dropdown-item delete-btn" href="includes/manage_location_delete.php?id=<?= $row['id'] ?>"><i class="fas fa-trash"></i> Delete</a>
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
                    text: "You won't be able to revert this!",
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

        // Success alert
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
