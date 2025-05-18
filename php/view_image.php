<?php

include "./connect.php";

if (isset($_GET['id']))
    $id = $_GET['id']; // Get ID from URL

// Fetch image from database
$query = "SELECT images FROM course WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($imageData);
$stmt->fetch();
$stmt->close();
$conn->close();

echo $imageData;
