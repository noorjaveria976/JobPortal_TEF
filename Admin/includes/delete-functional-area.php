<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM functional_areas WHERE id=$id");
    $_SESSION['success'] = "Functional Area deleted successfully!";
}
header("Location: ../FunctionalAreas.php");
exit;
?>
