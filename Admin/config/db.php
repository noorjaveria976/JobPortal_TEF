<?php
// Database connection
$host = "localhost";   // XAMPP default
$user = "root";        // XAMPP default user
$pass = "";            // XAMPP default password (blank hota hai)
$db   = "jobportal";   // tumhara database ka naam

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("❌ Database Connection Failed: " . $conn->connect_error);
}
?>
