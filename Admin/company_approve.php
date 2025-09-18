<?php
include "../config/db.php";
if(isset($_GET['id'])){
    $id=intval($_GET['id']);
    $conn->query("UPDATE companies SET status='Active' WHERE id=$id");
}
header("Location: ../manageCompany.php");
exit;
?>
