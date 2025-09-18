<?php
include "../config/db.php";
$provider_id = 2; // 👈 Example static JobProvider ID

$result = $conn->query("SELECT * FROM jobs WHERE provider_id=$provider_id ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Jobs</title>
</head>
<body>
<h2>My Jobs</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>Title</th><th>Status</th><th>Created</th>
    </tr>
    <?php while($job = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $job['id'] ?></td>
        <td><?= $job['title'] ?></td>
        <td><?= ucfirst($job['status']) ?></td>
        <td><?= $job['created_at'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
