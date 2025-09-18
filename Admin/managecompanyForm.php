<?php
session_start();
include "config/db.php";

// Default company array
$company = [
    'id'=>'',
    'name'=>'',
    'industry'=>'',
    'contact_person'=>'',
    'email'=>'',
    'phone'=>'',
    'website'=>'',
    'address'=>'',
    'status'=>'Active',
    'logo'=>''
];

// Edit mode: fetch company data
if(isset($_GET['id'])){
    $id=intval($_GET['id']);
    $res=$conn->query("SELECT * FROM companies WHERE id=$id");
    if($res->num_rows>0){
        $company=$res->fetch_assoc();
    }
}

// Form submission
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $industry = $_POST['industry'];
    $contact_person = $_POST['contact_person'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $address = $_POST['address'];
    $status = $_POST['status'];

    // Logo Upload
    if(isset($_FILES['logo']) && $_FILES['logo']['error']==0){
        $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $filename = time()."_logo.".$ext;
        move_uploaded_file($_FILES['logo']['tmp_name'], "uploads/".$filename);
    } else {
        $filename = $company['logo'];
    }

    if(!empty($_POST['id'])){ // Update
        $id=intval($_POST['id']);
        $stmt=$conn->prepare("UPDATE companies SET name=?, industry=?, contact_person=?, email=?, phone=?, website=?, address=?, status=?, logo=? WHERE id=?");
        $stmt->bind_param("sssssssssi",$name,$industry,$contact_person,$email,$phone,$website,$address,$status,$filename,$id);
        $stmt->execute();
        $_SESSION['success']="Company updated successfully!";
    } else { // Insert
        $stmt=$conn->prepare("INSERT INTO companies(name,industry,contact_person,email,phone,website,address,status,logo) VALUES(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss",$name,$industry,$contact_person,$email,$phone,$website,$address,$status,$filename);
        $stmt->execute();
        $_SESSION['success']="Company added successfully!";
    }

    header("Location: manageCompany.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $company['id']?'Edit Company':'Add Company' ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
        <div class="card shadow-sm  card-primary">
          <div class="card-header ">
            <h5><?= $company['id']?'Edit Company':'Add Company' ?></h5>
          </div>
          <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $company['id'] ?>">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Company Name</label>
                  <input type="text" name="name" class="form-control" value="<?= $company['name'] ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Industry</label>
                  <input type="text" name="industry" class="form-control" value="<?= $company['industry'] ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Contact Person</label>
                  <input type="text" name="contact_person" class="form-control" value="<?= $company['contact_person'] ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="<?= $company['email'] ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Phone</label>
                  <input type="text" name="phone" class="form-control" value="<?= $company['phone'] ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label>Website</label>
                  <input type="url" name="website" class="form-control" value="<?= $company['website'] ?>">
                </div>
                <div class="col-md-6 mb-3">
                  <label>Address</label>
                  <textarea name="address" class="form-control" rows="1"><?= $company['address'] ?></textarea>
                </div>
                <div class="col-md-3 mb-3">
                  <label>Status</label>
                  <select name="status" class="form-control">
                    <option <?= $company['status']=='Active'?'selected':'' ?>>Active</option>
                    <option <?= $company['status']=='Inactive'?'selected':'' ?>>Inactive</option>
                    <option <?= $company['status']=='Pending'?'selected':'' ?>>Pending</option>
                  </select>
                </div>
                <div class="col-md-3 mb-3">
                  <label>Logo</label>
                  <input type="file" name="logo" class="form-control" id="logo-input">
                  <?php if(!empty($company['logo']) && file_exists("uploads/".$company['logo'])): ?>
                    <img id="logo-preview" src="uploads/<?= $company['logo'] ?>" width="50" class="mt-1">
                  <?php else: ?>
                    <img id="logo-preview" src="#" width="50" class="mt-1" style="display:none;">
                  <?php endif; ?>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary"><?= $company['id']?'Update':'Add' ?> Company</button>
                <a href="manageCompany.php" class="btn btn-secondary ms-2">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </section>
          <?php include('includes/footer.php'); ?>
    </div>
  </div>
</div>

<script>
  // Logo preview
  document.getElementById("logo-input").addEventListener("change", function(){
      const [file] = this.files;
      if(file){
          const preview = document.getElementById("logo-preview");
          preview.src = URL.createObjectURL(file);
          preview.style.display = "inline-block";
      }
  });

  // SweetAlert on success (from session)
  <?php if(isset($_SESSION['success'])): ?>
      Swal.fire({
          icon: 'success',
          title: 'Success',
          text: '<?= $_SESSION['success'] ?>'
      });
      <?php unset($_SESSION['success']); ?>
  <?php endif; ?>
</script>

<!-- Template & Custom -->
<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
