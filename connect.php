<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "house";

// Create connection
$conn = new mysql($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>