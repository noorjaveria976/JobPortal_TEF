<?php
session_start();
include 'include/config.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $query = "DELETE FROM projects WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }
}
?>
