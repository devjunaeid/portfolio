<?php
$servername = "localhost";
$username = "root";
$password = "aaa";
$dbname = "user_info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

return $conn;
$conn->close();
?>
