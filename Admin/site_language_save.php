<?php
session_start();
include "config/db.php";

$id = $_POST['id'] ?? '';
$name = $_POST['language_name'];
$code = $_POST['language_code'];
$status = $_POST['status'] ?? 'Active';

// Handle file upload
$flag_path = '';
if(isset($_FILES['flag_image']) && $_FILES['flag_image']['name'] != ''){
    $ext = pathinfo($_FILES['flag_image']['name'], PATHINFO_EXTENSION);
    $flag_path = "uploads/flags/".time().".".$ext;
    move_uploaded_file($_FILES['flag_image']['tmp_name'], $flag_path);
}

if($id){ // Update
    if($flag_path){
        $stmt = $conn->prepare("UPDATE site_languages SET language_name=?, language_code=?, status=?, flag=? WHERE id=?");
        $stmt->bind_param("ssssi",$name,$code,$status,$flag_path,$id);
    } else {
        $stmt = $conn->prepare("UPDATE site_languages SET language_name=?, language_code=?, status=? WHERE id=?");
        $stmt->bind_param("sssi",$name,$code,$status,$id);
    }
    $stmt->execute();
    $_SESSION['success'] = "Language updated successfully!";
} else { // Add
    $stmt = $conn->prepare("INSERT INTO site_languages (language_name, language_code, status, flag) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$name,$code,$status,$flag_path);
    $stmt->execute();
    $_SESSION['success'] = "Language added successfully!";
}

header("Location:./manage_site_langauge.php");
exit();
?>
