<?php
$servername = "sql111.infinityfree.com";
$username = "if0_37953349";
$password = "cf9pBu1A0uxi7";
$dbname = "if0_37953349_greenland";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
?>