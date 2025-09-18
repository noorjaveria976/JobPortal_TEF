<?php
session_start();
include "../config/db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete image also
    $res = $conn->query("SELECT image FROM testimonials WHERE id=$id");
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if (!empty($row['image']) && file_exists("../uploads/testimonials/" . $row['image'])) {
            unlink("../uploads/testimonials/" . $row['image']);
        }
    }

    $conn->query("DELETE FROM testimonials WHERE id=$id");
    $_SESSION['success'] = "Testimonial deleted successfully!";
}

header("Location: ../manage_testimonial.php");
exit;
?>
