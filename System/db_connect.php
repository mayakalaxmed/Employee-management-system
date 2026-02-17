<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ems_db";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    error_log("Database connection error: " . mysqli_connect_error());
    die("System error: Unable to connect to database.");
}

// Set charset
mysqli_set_charset($conn, "utf8mb4");
?>

