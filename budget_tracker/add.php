<?php
include 'db.php';

$title = $_POST['title'];
$amount = $_POST['amount'];
$category = $_POST['category'];
$date = $_POST['date'];

$stmt = $conn->prepare("INSERT INTO expenses (title, amount, category, date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sdss", $title, $amount, $category, $date);
$stmt->execute();

header("Location: index.php");
?>
