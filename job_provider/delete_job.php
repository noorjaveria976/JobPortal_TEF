<?php

include "../job_seeker/include/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['action'])) {
    $id = intval($_POST['id']);
    $action = $_POST['action'];

    if ($action === 'expire') {
        // Active job ko expired bana do
        $sql = "UPDATE jobs SET status='expired' WHERE id=$id";
    } elseif ($action === 'delete') {
        // Expired job ko permanently delete kar do
        $sql = "DELETE FROM jobs WHERE id=$id";
    } else {
        echo "invalid action";
        exit;
    }

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }
} else {
    echo "invalid request";
}
?>
