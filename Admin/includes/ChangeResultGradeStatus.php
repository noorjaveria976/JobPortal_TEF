<?php
session_start();
include "../config/db.php";

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT status FROM result_grades WHERE id=$id LIMIT 1");
    if($res->num_rows){
        $row = $res->fetch_assoc();
        $newStatus = $row['status']==1 ? 0 : 1;
        $conn->query("UPDATE result_grades SET status=$newStatus WHERE id=$id");
        $_SESSION['success'] = "Status changed successfully!";
    }
}

header("Location: ../ResultGrade.php");
exit;
