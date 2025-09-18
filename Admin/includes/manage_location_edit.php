<?php
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    header("Location: ../manage_location_form.php?id=$id");
    exit();
} else {
    header("Location: ../manage_location.php");
    exit();
}
?>
