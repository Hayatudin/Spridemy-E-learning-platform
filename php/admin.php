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

    if (isset($_POST['submit'])) {
        $courseName = $_POST['courseName'];

        if (isset($_FILES['courseImage']) && $_FILES['courseImage']['error'] === UPLOAD_ERR_OK) {
            // Get the binary content of the uploaded image
            $image = file_get_contents($_FILES['courseImage']['tmp_name']);


            $escapedImage = mysqli_real_escape_string($conn, $image);

            // Construct the SQL query

            $sqlCheck = "SELECT * FROM course WHERE course_name = '$courseName'";
            $checkResult = mysqli_query($conn, $sqlCheck);
            $row = mysqli_num_rows($checkResult);
            if ($row !== 0) {
                echo "<script>alert('Course already exists!');</script>";
                header("Location: ./admin.php");
            } else {
                $sql = "INSERT INTO course (course_name, images) VALUES ('$courseName', '$escapedImage')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<script>alert('Course added successfully!');</script>";
                } else {
                    echo "<script>alert('Error adding course: " . mysqli_error($conn) . "');</script>";
                }
            }
        } else {
            echo "<script>alert('Please upload a valid image.');</script>";
        }
    }

    if (isset($_POST['Delete'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM course WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
    }
}

