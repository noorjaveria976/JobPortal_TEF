<?php
session_start();
include "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Manage FAQs</title>

    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">

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
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm">
                           <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
    <div>
        <i class="fas fa-database"></i> Manage FAQs
    </div>
    <a href="FAQ_form.php" class="btn btn-success btn-sm">
        <i class="fas fa-plus"></i> Add FAQ
    </a>
</div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="tableExport">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                    <th>Last Updated</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $res = $conn->query("SELECT * FROM faqs ORDER BY id DESC");
                                                $i = 1;
                                                while ($row = $res->fetch_assoc()):
                                                ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $row['question'] ?></td>
                                                        <td><?= $row['answer'] ?></td>
                                                        <td><?= $row['last_updated'] ?></td>
                                                        <td>
                                                            <div class="dropdown d-inline">
                                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item has-icon" href="FAQ_form.php?id=<?= $row['id'] ?>">
                                                                        <i class="fas fa-edit"></i>Edit</a>
                                                                    <a class="dropdown-item has-icon delete-btn" href="faq_delete.php?id=<?= $row['id'] ?>" data-id="<?= $row['id'] ?>">
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
                </section>
            </div>
            <?php include('includes/footer.php'); ?>
        </div>
    </div>
<script src="assets/js/page/datatables.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
        // SweetAlert for session messages
        <?php if (isset($_SESSION['success'])): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= $_SESSION['success'] ?>'
            });
        <?php unset($_SESSION['success']);
        endif; ?>

        // SweetAlert confirmation for delete
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
            });
        });
    </script>
</body>

</html>