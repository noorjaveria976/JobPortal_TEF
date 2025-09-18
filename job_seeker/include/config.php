<?php
// Connection parameters
$host = "localhost";      // Hostname
$user = "root";           // Default XAMPP username
$password = "";           // Default XAMPP password is empty
$database = "job-seeker"; // Your database name

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
