<?php
session_start();
include "../config/db.php";

// Fetch all jobs for admin
$jobs = $conn->query("SELECT * FROM jobs ORDER BY id DESC");
if (!$jobs) {
    die("Database query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Jobs</title>
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include "includes/source.html"; ?>
</head>

<body>
    <?php include "includes/navbar.php"; ?>
    <?php include "includes/sidebar.html"; ?>

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <h5>Manage Jobs</h5>
                <div class="card card-primary">
                    <div class="card-header d-flex justify-content-between align-items-center"></div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableExport">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Salary</th>
                                        <th>Job Type</th>
                                        <th>Job Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = $jobs->fetch_assoc()) {
                                        $status = isset($row['status']) && !empty($row['status']) ? ucfirst($row['status']) : 'Inactive';

                                        // Status badge
                                        if ($status == 'Active') {
                                            $displayStatus = 'Approved';
                                            $badgeClass = 'success';
                                        } elseif ($status == 'Inactive') {
                                            $displayStatus = 'Pending';
                                            $badgeClass = 'warning';
                                        } else {
                                            $displayStatus = 'Rejected';
                                            $badgeClass = 'danger';
                                        }

                                        $salary = $row['salary_from'] && $row['salary_to'] ? $row['salary_from'] . '-' . $row['salary_to'] . ' ' . $row['salary_currency'] : 'N/A';
                                        $jobType = $row['job_type_id'] == 1 ? 'Contract' : ($row['job_type_id'] == 2 ? 'Freelance' : ($row['job_type_id'] == 3 ? 'Full Time' : 'Other'));

                                        echo "<tr>
                                            <td>{$i}</td>
                                            <td>" . htmlspecialchars($row['title']) . "</td>
                                            <td>" . htmlspecialchars($row['company_name']) . "</td>
                                            <td>{$salary}</td>
                                            <td>{$jobType}</td>
                                            <td><span class='badge badge-{$badgeClass}'>$displayStatus</span></td>
                                            <td class='text-nowrap'>
                                                <div class='dropdown'>
                                                    <button class='btn btn-light btn-sm dropdown-toggle' type='button' data-toggle='dropdown'>
                                                        <i class='fas fa-ellipsis-v'></i>
                                                    </button>
                                                    <div class='dropdown-menu'>
                                        ";

                                        // Actions in dropdown
                                        if ($status != 'Active') {
                                            echo "<a class='dropdown-item status-btn' href='job_status.php?action=approve&id={$row['id']}'>Approve</a>";
                                        }
                                        if ($status != 'Inactive') {
                                            echo "<a class='dropdown-item status-btn' href='job_status.php?action=set_pending&id={$row['id']}'>Pending</a>";
                                        }
                                        if ($status != 'Rejected') {
                                            echo "<a class='dropdown-item status-btn' href='job_status.php?action=reject&id={$row['id']}'>Reject</a>";
                                        }

                                        // Edit
                                        echo "<a class='dropdown-item btn-edit'
                                                href='#'
                                                data-id='{$row['id']}'
                                                data-title='" . htmlspecialchars($row['title']) . "'
                                                data-company='" . htmlspecialchars($row['company_name']) . "'
                                                data-salary_from='{$row['salary_from']}'
                                                data-salary_to='{$row['salary_to']}'
                                                data-currency='{$row['salary_currency']}'
                                                data-job_type='{$row['job_type_id']}'
                                                data-status='{$row['status']}'>Edit</a>";

                                        // Delete
                                        echo "<a class='dropdown-item delete-btn' href='deleteJob.php?id={$row['id']}'>Delete</a>";

                                        echo "</div></div></td></tr>";
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include "includes/footer.php"; ?>

    <!-- Edit Job Modal -->
    <div class="modal fade" id="editJobModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="max-width: 55%;">
            <div class="modal-content">
                <form method="POST" action="includes/save_job.php">
                    <input type="hidden" name="id" id="editJobId">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Job</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" name="title" id="editJobTitle" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" name="company_name" id="editJobCompany" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Salary From</label>
                            <input type="number" name="salary_from" id="editSalaryFrom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Salary To</label>
                            <input type="number" name="salary_to" id="editSalaryTo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Currency</label>
                            <input type="text" name="salary_currency" id="editCurrency" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Job Type</label>
                            <select name="job_type_id" id="editJobType" class="form-control" required>
                                <option value="1">Contract</option>
                                <option value="2">Freelance</option>
                                <option value="3">Full Time</option>
                                <option value="4">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="editJobStatus" class="form-control">
                                <option value="Active">Approved</option>
                                <option value="Inactive">Pending</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update_job" class="btn btn-primary">Update Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Edit modal populate
            document.querySelectorAll(".btn-edit").forEach(function(btn) {
                btn.addEventListener("click", function(e) {
                    e.preventDefault();
                    document.getElementById("editJobId").value = this.dataset.id;
                    document.getElementById("editJobTitle").value = this.dataset.title;
                    document.getElementById("editJobCompany").value = this.dataset.company;
                    document.getElementById("editSalaryFrom").value = this.dataset.salary_from;
                    document.getElementById("editSalaryTo").value = this.dataset.salary_to;
                    document.getElementById("editCurrency").value = this.dataset.currency;
                    document.getElementById("editJobType").value = this.dataset.job_type;
                    document.getElementById("editJobStatus").value = this.dataset.status;
                    $('#editJobModal').modal('show');
                });
            });

            // Delete confirmation
            document.querySelectorAll(".delete-btn").forEach(function(btn) {
                btn.addEventListener("click", function(e) {
                    e.preventDefault();
                    const url = this.href;
                    Swal.fire({
                        title: "Are you sure?",
                        text: "This job will be deleted!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });

            // Status confirmation
            document.querySelectorAll(".status-btn").forEach(function(btn) {
                btn.addEventListener("click", function(e) {
                    e.preventDefault();
                    const url = this.href;
                    const status = this.textContent;
                    Swal.fire({
                        title: "Change Status?",
                        text: "Change status to " + status + "?",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonText: "Yes"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        });
    </script>

    <script src="assets/js/page/datatables.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
