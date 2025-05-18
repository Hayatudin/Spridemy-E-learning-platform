<?php
include "./connect.php";

// Check if search input is submitted
$searchQuery = isset($_POST['searchInput']) ? trim($_POST['searchInput']) : "";

// Fetch courses that match the search query
$courses = [];
if (!empty($searchQuery)) {
    $sql = "SELECT * FROM course WHERE course_name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
    }
}

// Get the first letter of the username (if available)
if (isset($_SESSION['Username'])) {
    $firstLetter = substr($_SESSION['Username'], 0, 1);
} else {
    $firstLetter = '';
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- link x-icon -->
    <link rel="shortcut icon" href="../image/spridemy-xicon-01.png" type="x-icon" />

    <!-- remix icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" integrity="sha512-XcIsjKMcuVe0Ucj/xgIXQnytNwBttJbNjltBV18IOnru2lDPe9KRRyvCXw6Y5H415vbBLRm8+q6fmLUU7DfO6Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- link css -->
    <link href="../src/output.css" rel="stylesheet" />
