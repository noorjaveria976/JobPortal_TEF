<?php
session_start();
include "config/db.php";

$location = ['id' => '', 'country' => '', 'state' => '', 'city' => '', 'status' => 'Active'];

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT * FROM manage_location WHERE id=$id");

    if ($res && $res->num_rows > 0) {
        $location = $res->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $location['id'] ? 'Edit Location' : 'Add Location' ?></title>
    <link rel="stylesheet" href="assets/css/app.min.css">
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
                            <div class="card shadow-sm card-primary">
                                <div class="card-header h5"><?= $location['id'] ? 'Edit Location' : 'Add Location' ?></div>
                                <div class="card-body">
                                    <form method="POST" action="includes/manage_location_save.php">
                                        <input type="hidden" name="id" value="<?= $location['id'] ?>">

                                        <div class="mb-3">
                                            <label>Country</label>
                                            <input type="text" name="country" class="form-control" required value="<?= $location['country'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label>State</label>
                                            <input type="text" name="state" class="form-control" required value="<?= $location['state'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control" required value="<?= $location['city'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="Active" <?= $location['status'] == 'Active' ? 'selected' : '' ?>>Active</option>
                                                <option value="Inactive" <?= $location['status'] == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-success"><?= $location['id'] ? 'Update' : 'Add' ?> Location</button>
                                        <a href="manage_location.php" class="btn btn-secondary">Cancel</a>
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
</body>

</html>
