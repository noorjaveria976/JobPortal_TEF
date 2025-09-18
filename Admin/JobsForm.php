<?php
session_start();
include "../config/db.php";

// Check if edit request
$job = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM jobs WHERE id=$id");
    if ($result && $result->num_rows > 0) {
        $job = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo $job ? "Edit Job" : "Post a Job"; ?></title>
  <?php include "includes/source.html"; ?>
</head>

<body>
  <?php include "includes/navbar.php"; ?>
  <?php include "includes/sidebar.html"; ?>

  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h5><?php echo $job ? "Edit Job" : "Post a Job"; ?></h5>
      </div>

      <div class="section-body">
        <div class="card card-primary">
          <div class="card-header">
            <h4><?php echo $job ? "Update Job Details" : "Add New Job"; ?></h4>
          </div>
          <div class="card-body">
            <form action="includes/save_job.php" method="POST">
              
              <?php if ($job): ?>
                <input type="hidden" name="id" value="<?php echo $job['id']; ?>">
              <?php endif; ?>

              <!-- Row 1 -->
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Job Title</label>
                  <input type="text" name="title" class="form-control" required 
                         value="<?php echo $job ? $job['title'] : ''; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label>Company Name</label>
                  <input type="text" name="company_name" class="form-control" required 
                         value="<?php echo $job ? $job['company_name'] : ''; ?>">
                </div>
              </div>

              <!-- Row 2 -->
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Description</label>
                  <textarea name="description" rows="3" class="form-control" required><?php echo $job ? $job['description'] : ''; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>Benefits</label>
                  <textarea name="benefits" rows="2" class="form-control"><?php echo $job ? $job['benefits'] : ''; ?></textarea>
                </div>
              </div>

              <!-- Row 3 (Country, State, City) -->
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Country</label>
                  <input type="text" name="country_id" class="form-control" value="<?php echo $job ? $job['country_id'] : ''; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label>State</label>
                  <input type="text" name="state_id" class="form-control" value="<?php echo $job ? $job['state_id'] : ''; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label>City</label>
                  <input type="text" name="city_id" class="form-control" value="<?php echo $job ? $job['city_id'] : ''; ?>">
                </div>
              </div>

              <!-- Row 4 (Salary, Currency, Period) -->
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Salary From</label>
                  <input type="number" step="0.01" name="salary_from" class="form-control" 
                         value="<?php echo $job ? $job['salary_from'] : ''; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label>Salary To</label>
                  <input type="number" step="0.01" name="salary_to" class="form-control" 
                         value="<?php echo $job ? $job['salary_to'] : ''; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Currency</label>
                  <input type="text" name="salary_currency" class="form-control" 
                         value="<?php echo $job ? $job['salary_currency'] : ''; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Period</label>
                  <select name="salary_period_id" class="form-control">
                    <option value="1" <?php echo ($job && $job['salary_period_id']==1)?'selected':''; ?>>Monthly</option>
                    <option value="2" <?php echo ($job && $job['salary_period_id']==2)?'selected':''; ?>>Yearly</option>
                    <option value="3" <?php echo ($job && $job['salary_period_id']==3)?'selected':''; ?>>Hourly</option>
                  </select>
                </div>
              </div>

              <!-- (similar pattern for other fields, prefilled using $job if edit mode) -->

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option value="Active"   <?php echo ($job && $job['status']=="Active")?'selected':''; ?>>Active</option>
                    <option value="Inactive" <?php echo ($job && $job['status']=="Inactive")?'selected':''; ?>>Inactive</option>
                    <option value="Rejected" <?php echo ($job && $job['status']=="Rejected")?'selected':''; ?>>Rejected</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Created At</label>
                  <input type="datetime-local" name="created_at" class="form-control" 
                         value="<?php echo $job ? date('Y-m-d\TH:i', strtotime($job['created_at'])) : ''; ?>">
                </div>
              </div>

              <div class="form-group text-right">
                <?php if ($job): ?>
                  <button type="submit" name="update_job" class="btn btn-warning">Update Job</button>
                <?php else: ?>
                  <button type="submit" name="add_job" class="btn btn-primary">Save Job</button>
                <?php endif; ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include "includes/footer.php"; ?>
  
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
