<?php
session_start();
include "config/db.php";
// Form submission handled in includes/save-industry.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add New Industry</title>
    <?php include "includes/source.html"; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php include "includes/navbar.php"; ?>
            <?php include "includes/sidebar.html"; ?>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="container mt-4">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="mb-0"><i class="fa fa-edit"></i> Edit Admin User</h5>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <!-- Full Name -->
                                                <div class="mb-3">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" value="Sana Sattar">
                                                </div>

                                                <!-- Email -->
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" value="sana@example.com">
                                                </div>

                                                <!-- Username -->
                                                <div class="mb-3">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" class="form-control" value="sana_admin">
                                                </div>

                                                <!-- Password -->
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" class="form-control"
                                                        placeholder="Enter new password">
                                                </div>

                                                <!-- Role -->
                                                <div class="mb-3">
                                                    <label class="form-label">Role</label>
                                                    <select class="form-select w-100 border border-secondary-subtle "
                                                        style="height: 40px;">
                                                        <option selected>Super Admin</option>
                                                        <option>Admin</option>
                                                        <option>Editor</option>
                                                    </select>
                                                </div>

                                                <!-- Status -->
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-select w-100 border border-secondary-subtle "
                                                        style="height: 40px;">
                                                        <option selected>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
                                                </div>

                                                <!-- Submit -->
                                                <button class="btn btn-primary">
                                                    <i class="fa fa-save"></i> Update Admin
                                                </button>
                                            </form>
                                        </div>
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
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>