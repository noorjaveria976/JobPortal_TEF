<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    // Get logo file
    $res = $conn->query("SELECT logo FROM companies WHERE id=$id");
    if($res->num_rows>0){
        $row = $res->fetch_assoc();
        if(!empty($row['logo']) && file_exists("../uploads/".$row['logo'])){
            unlink("../uploads/".$row['logo']); // Delete logo
        }
    }

    // Delete company
    $conn->query("DELETE FROM companies WHERE id=$id");
    $_SESSION['success'] = "Company deleted successfully!";
    header("Location: ../manageCompany.php");
    exit;
}
?>
