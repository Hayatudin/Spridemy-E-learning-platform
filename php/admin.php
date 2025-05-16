<?php

include "./connect.php";

if (!isset($_SESSION['adminUname']) || $_SESSION['Username'] !== 'hayu') {
    die("Access denied. Admin only.");
} else {
    $studentQuery = "SELECT COUNT(*) as total_students FROM studentinfo";
    $studentResult = mysqli_query($conn, $studentQuery);
    $studentData = mysqli_fetch_assoc($studentResult);
    $totalStudents = $studentData['total_students'];

    $courseQuery = "SELECT COUNT(*) as total_courses FROM course";
    $courseResult = mysqli_query($conn, $courseQuery);
    $courseData = mysqli_fetch_assoc($courseResult);
    $totalCourses = $courseData['total_courses'];

    $studentsQuery = "SELECT * FROM studentinfo";
    $studentsResult = mysqli_query($conn, $studentsQuery);

    $commentUser = "SELECT * FROM studentinfo where comment != ''";
    $commentResult = mysqli_query($conn, $commentUser);

    if (isset($_POST['user'])) {

        session_destroy();

        session_start();
        $_SESSION['Username'] = 'Hayu';

        header("Location: ./home.php");
        exit();
    }

    if (isset($_POST['logout'])) {
        session_destroy();

        header("Location: ../src/index.php");
        exit();
    }
