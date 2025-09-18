<?php
session_start();
include "../config/db.php";

// --- Input values ---
$id      = $_POST['id'] ?? '';
$country = trim($_POST['country'] ?? '');
$state   = trim($_POST['state'] ?? '');
$city    = trim($_POST['city'] ?? '');
$status  = $_POST['status'] ?? 'Inactive';

// --- Validation ---
if (empty($country) || empty($state) || empty($city)) {
    $_SESSION['error'] = "All fields are required.";
    header("Location: ../manage_location.php");
    exit;
}

// --- Generate ISO code (first 3 letters) ---
$iso_code = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $country), 0, 3));

if ($id) {
    // -------- Update locations
    $stmt1 = $conn->prepare("UPDATE locations SET country=?, state=?, city=?, status=? WHERE id=?");
    if ($stmt1) {
        $stmt1->bind_param("ssssi", $country, $state, $city, $status, $id);
        $stmt1->execute();
        $stmt1->close();
    }

    // -------- Update manage_location
    $stmt2 = $conn->prepare("UPDATE manage_location SET country=?, iso_code=?, state=?, city=?, status=? WHERE id=?");
    if ($stmt2) {
        $stmt2->bind_param("sssssi", $country, $iso_code, $state, $city, $status, $id);
        $stmt2->execute();
        $stmt2->close();
    }

    $_SESSION['success'] = "Location updated successfully";
} else {
    // -------- Insert into manage_location first
    $stmt1 = $conn->prepare("INSERT INTO manage_location (country, iso_code, state, city, status) VALUES (?,?,?,?,?)");
    if ($stmt1) {
        $stmt1->bind_param("sssss", $country, $iso_code, $state, $city, $status);
        $stmt1->execute();
        $last_id = $stmt1->insert_id;
        $stmt1->close();

        // -------- Insert into locations with same ID
        $stmt2 = $conn->prepare("INSERT INTO locations (id, country, state, city, status) VALUES (?,?,?,?,?)");
        if ($stmt2) {
            $stmt2->bind_param("issss", $last_id, $country, $state, $city, $status);
            $stmt2->execute();
            $stmt2->close();
        }
    }

    $_SESSION['success'] = "Location added successfully";
}

// --- Redirect back ---
header("Location: ../manage_location.php");
exit;
?>
