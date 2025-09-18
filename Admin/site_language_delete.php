<?php
session_start();
include "config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT flag FROM site_languages WHERE id=$id");
    if($res->num_rows>0){
        $row = $res->fetch_assoc();
        if($row['flag'] && file_exists($row['flag'])){
            unlink($row['flag']);
        }
    }
    $conn->query("DELETE FROM site_languages WHERE id=$id");
    $_SESSION['success'] = "Language deleted successfully!";
}

header("Location:./manage_site_langauge.php");
exit();
?>
