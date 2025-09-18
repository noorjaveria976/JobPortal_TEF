<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM degree_types WHERE id=$id");
    $_SESSION['success'] = "Degree Type deleted successfully!";
}

header("Location: ../DegreeTypes.php");
exit;
?>
