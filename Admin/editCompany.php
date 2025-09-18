<?php
session_start();
include "config/db.php";

if (!isset($_GET['id'])) {
    header("Location: manageCompany.php");
    exit;
}

$id = intval($_GET['id']); // safer
$res = $conn->query("SELECT * FROM companies WHERE id=$id");
$company = $res->fetch_assoc();

if (!$company) {
    $_SESSION['error'] = "Company not found!";
    header("Location: manageCompany.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $name = trim($_POST['name']);
    $industry = trim($_POST['industry']);
    $contact_person = trim($_POST['contact_person']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $website = trim($_POST['website']);
    $address = trim($_POST['address']);
    $status = $_POST['status'];

    // Handle logo upload
    $logo = $company['logo']; // default old logo
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
        $logoFile = $_FILES['logo']['name'];
        $logo = time() . '_' . preg_replace('/\s+/', '_', $logoFile); // replace spaces
        $uploadDir = __DIR__ . '/uploads/';
        if (!move_uploaded_file($_FILES['logo']['tmp_name'], $uploadDir . $logo)) {
            $_SESSION['error'] = "Logo upload failed!";
        }
    }

    // Update database
    $stmt = $conn->prepare("UPDATE companies SET name=?, industry=?, contact_person=?, email=?, phone=?, website=?, address=?, status=?, logo=? WHERE id=?");
    $stmt->bind_param("sssssssssi", $name, $industry, $contact_person, $email, $phone, $website, $address, $status, $logo, $id);
    $stmt->execute();

    $_SESSION['success'] = "Company updated successfully!";
    header("Location: manageCompany.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Company</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include('includes/source.html'); ?>
</head>
<body>
<div id="app">
    <?php include('includes/navbar.php'); ?>
    <?php include('includes/sidebar.html'); ?>
    <div class="main-content container mt-4">
        <div class="card shadow rounded card-primary">
            <div class="card-header h3">Edit Company</div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Other fields same as before -->
                        <div class="col-md-6 mb-3">
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control">
                            <?php if (!empty($company['logo']) && file_exists(__DIR__ . '/uploads/' . $company['logo'])): ?>
                                <img src="uploads/<?= htmlspecialchars($company['logo']) ?>" style="width:80px;margin-top:5px;object-fit:cover;border-radius:5px;">
                            <?php endif; ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Update Company</button>
                    <a href="manageCompany.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
        <?php include('includes/footer.php'); ?>
    </div>
    <script src="assets/js/page/datatables.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
