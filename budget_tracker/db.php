<?php
$host = "localhost";
$user = "root";      // default in XAMPP
$password = "";      // default is empty in XAMPP
$database = "budget_tracker";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
