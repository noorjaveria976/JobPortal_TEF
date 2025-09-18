<?php
session_start();
include "../config/db.php";

// Fetch all users
$result = $conn->query("SELECT * FROM admin_users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
</head>
<body>
<h2>Manage Users</h2>
<a href="addUser.php">+ Add New User</a>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Actions</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= ucfirst($row['role']) ?></td>
        <td><?= $row['status']==1 ? "Active":"Inactive" ?></td>
        <td>
            <a href="editUser.php?id=<?= $row['id'] ?>">Edit</a> | 
            <a href="deleteUser.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
