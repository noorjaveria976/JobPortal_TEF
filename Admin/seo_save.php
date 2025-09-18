<?php
session_start();
include "config/db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = !empty($_POST['id']) ? intval($_POST['id']) : null;
    $page_name = $conn->real_escape_string($_POST['page_name']);
    $meta_title = $conn->real_escape_string($_POST['meta_title']);
    $meta_description = $conn->real_escape_string($_POST['meta_description']);
    $keywords = $conn->real_escape_string($_POST['keywords']);
    $slug = $conn->real_escape_string($_POST['slug']);

    if($id) {
        // Update
        $stmt = $conn->prepare("UPDATE seo_pages SET page_name=?, meta_title=?, meta_description=?, keywords=?, slug=?, last_updated=NOW() WHERE id=?");
        if(!$stmt) die("Prepare failed: ".$conn->error);
        $stmt->bind_param("sssssi",$page_name,$meta_title,$meta_description,$keywords,$slug,$id);
        $stmt->execute();
        $_SESSION['success'] = "SEO page updated successfully!";
    } else {
        // Insert
        $stmt = $conn->prepare("INSERT INTO seo_pages(page_name, meta_title, meta_description, keywords, slug, last_updated) VALUES(?,?,?,?,?,NOW())");
        if(!$stmt) die("Prepare failed: ".$conn->error);
        $stmt->bind_param("sssss",$page_name,$meta_title,$meta_description,$keywords,$slug);
        $stmt->execute();
        $_SESSION['success'] = "SEO page added successfully!";
    }

    header("Location: SEO_table.php");
    exit;
}
