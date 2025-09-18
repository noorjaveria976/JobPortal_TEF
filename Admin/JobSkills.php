<?php
session_start();
include "config/db.php";

$result = $conn->query("SELECT * FROM job_skills ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Skills</title>
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include "includes/source.html"; ?>
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <?php include "includes/navbar.php"; ?>
        <?php include "includes/sidebar.html"; ?>

        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-info text-white d-flex justify-content-between">
                            <i class="fas fa-lightbulb me-2"></i> Job Skills
                            <a href="JobsSkillForm.php" class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Add New Skill
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableExport" class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Skill Name</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= htmlspecialchars($row['skill_name']) ?></td>
                                            <td><?= htmlspecialchars($row['category']) ?></td>
                                            <td>
                                                <?php if($row['status']==1): ?>
                                                    <span class="badge bg-success text-white">Active</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger text-white">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="JobsSkillForm.php?id=<?= $row['id'] ?>">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item delete-btn" href="includes/delete-job-skill.php?id=<?= $row['id'] ?>">
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
            </section>
        </div>

        <?php include "includes/footer.php"; ?>
    </div>
</div>

<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
<script>
document.querySelectorAll('.delete-btn').forEach(btn=>{
    btn.addEventListener('click', function(e){
        e.preventDefault();
        const url = this.href;
        Swal.fire({
            title:'Are you sure?',
            text:'This action cannot be undone!',
            icon:'warning',
            showCancelButton:true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Yes, delete it!'
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href = url;
            }
        });
    });
});

<?php if(isset($_SESSION['success'])): ?>
Swal.fire({
    icon:'success',
    title:'Success',
    text:'<?= $_SESSION['success'] ?>'
});
<?php unset($_SESSION['success']); endif; ?>
</script>
</body>
</html>
