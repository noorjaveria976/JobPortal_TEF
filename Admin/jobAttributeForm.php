<?php
session_start();
include "config/db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$attribute_name = $attribute_value = "";
$status = 1;
$editMode = false;

if ($id > 0) {
    $editMode = true;
    $stmt = $conn->prepare("SELECT * FROM job_attributes WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if ($result) {
            $attribute_name = $result['attribute_name'];
            $attribute_value = $result['attribute_value'];
            $status = $result['status'];
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attribute_name = trim($_POST['attribute_name']);
    $attribute_value = trim($_POST['attribute_value']);
    $status = intval($_POST['status']);

    if ($editMode) {
        $stmt = $conn->prepare("UPDATE job_attributes SET attribute_name=?, attribute_value=?, status=? WHERE id=?");
        if ($stmt) {
            $stmt->bind_param("ssii", $attribute_name, $attribute_value, $status, $id);
            $stmt->execute();
            $_SESSION['success'] = "Attribute updated successfully!";
        }
    } else {
        $stmt = $conn->prepare("INSERT INTO job_attributes (attribute_name, attribute_value, status) VALUES (?,?,?)");
        if ($stmt) {
            $stmt->bind_param("ssi", $attribute_name, $attribute_value, $status);
            $stmt->execute();
            $_SESSION['success'] = "New attribute added successfully!";
        }
    }
    header("Location: manageJobAttribute.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $editMode ? "Edit" : "Add" ?> Job Attribute</title>
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
          <div class="container">
            <div class="card shadow-sm card-primary">
              <div class="card-header h5">
                <?= $editMode ? "Edit" : "Add" ?> Job Attribute
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="mb-3">
                    <label class="form-label">Attribute Name</label>
                    <input type="text" class="form-control" name="attribute_name" 
                           value="<?= htmlspecialchars($attribute_name) ?>" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Attribute Value</label>
                    <input type="text" class="form-control" name="attribute_value" 
                           value="<?= htmlspecialchars($attribute_value) ?>" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status" required>
                      <option value="1" <?= ($status == 1) ? "selected" : "" ?>>Active</option>
                      <option value="0" <?= ($status == 0) ? "selected" : "" ?>>Inactive</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-success">Save</button>
                  <a href="manageJobAttribute.php" class="btn btn-secondary">Cancel</a>
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
