<?php
session_start();
include "../config/db.php";

// ADD
if (isset($_POST['save'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $review = mysqli_real_escape_string($conn, $_POST['review']);
    $date = $_POST['review_date'];

    $imageName = null;
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../uploads/testimonials/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . $imageName);
    }

    $sql = "INSERT INTO testimonials (name, image, review, review_date) 
            VALUES ('$name', '$imageName', '$review', '$date')";
    $conn->query($sql);

    $_SESSION['success'] = "Testimonial added successfully!";
    header("Location: ../manage_testimonial.php");
    exit;
}

// UPDATE
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $review = mysqli_real_escape_string($conn, $_POST['review']);
    $date = $_POST['review_date'];

    // Purani image check
    $res = $conn->query("SELECT image FROM testimonials WHERE id=$id");
    $oldImage = "";
    if ($res && $res->num_rows > 0) {
        $oldImage = $res->fetch_assoc()['image'];
    }

    $imageName = $oldImage;
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "../uploads/testimonials/";
        if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

        // Purani delete
        if (!empty($oldImage) && file_exists($targetDir . $oldImage)) {
            unlink($targetDir . $oldImage);
        }

        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . $imageName);
    }

    $sql = "UPDATE testimonials 
            SET name='$name', image='$imageName', review='$review', review_date='$date' 
            WHERE id=$id";
    $conn->query($sql);

    $_SESSION['success'] = "Testimonial updated successfully!";
    header("Location: ../manage_testimonial.php");
    exit;
}
?>
