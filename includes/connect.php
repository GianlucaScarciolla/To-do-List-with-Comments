<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "todolistdb");
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} 
?>