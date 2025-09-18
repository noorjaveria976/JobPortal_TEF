<?php
include "../config/db.php";
$result = $conn->query("SELECT * FROM jobs WHERE status='active' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Available Jobs</title>
  <link rel="stylesheet" href="../assets/css/Customs.css">
</head>
<body>
  <div class="main-content container mt-4">
    <h4>Available Jobs</h4>
    <table class="table table-striped">
      <tr><th>Title</th><th>Description</th><th>City</th><th>Expiry Date</th></tr>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td><?= substr($row['description'],0,100) ?>...</td>
          <td><?= $row['city_id'] ?></td>
          <td><?= $row['expiry_date'] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
