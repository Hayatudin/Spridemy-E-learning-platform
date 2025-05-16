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

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- link x-icon -->
    <link
        rel="shortcut icon"
        href="../image/spridemy-xicon-01.png"
        type="x-icon" />
    <!-- remix icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />

    <!-- link css -->
    <link href="../src/output.css" rel="stylesheet" />

    <title>Spridemy/dashboard</title>
</head>

<body class="bg-black text-white">

    <section class="flex lg:flex-row sm:flex-col top-0 left-0 gap-4 items-start h-full" style="height:100%;">


        <div class="flex sm:flex-row lg:flex-col gap-8 lg:py-8 sm:px-3 sm:py-1 container bg-gray-800 fixed" style="width: 300px; height: 100%; ">
            <h2 class="font-bold text-2xl">Admin.</h2>
            <div class="flex lg:flex-col sm:flex-row lg:gap-4 sm:justify-evenly">
                <div class="flex gap-1 items-start cursor-pointer">
                    <i class="ri-user-3-line"></i>
                    <span class="sm:hidden lg:block hover:text-yellow-500" id="userLink">User dashboard</span>
                </div>
                <div class="flex gap-1 items-start cursor-pointer">
                    <img src="../Syllabus.png" style="width: 15px;">
                    <span class="sm:hidden lg:block hover:text-yellow-500" id="courseLink">Course Management</span>
                </div>
                <div class="flex gap-1 items-start cursor-pointer">
                    <i class="ri-chat-1-line"></i>
                    <span class="sm:hidden lg:block hover:text-yellow-500" id="feedbackLink">Feedback</span>
                </div>
                <div>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="flex gap-1 items-start cursor-pointer">
                        <i class="ri-mac-line"></i>
                        <input type="submit" name="user" class="sm:hidden lg:block hover:text-yellow-500" value="Display user screen" />
                    </form>
                </div>

                <div class="flex gap-1 items-start cursor-pointer">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <i class="ri-logout-box-r-line "></i>
                        <input type="submit" name="logout" value="Logout" class="hover:text-yellow-500">
                    </form>
                </div>
            </div>

        </div>

        <div class="">
            <div class="" style="padding: 30px 10px 20px 320px;" id="userDashboard">
                <h2 class="text-sm font-bold text-yellow-500">Welcome, <?php echo $_SESSION['Username'] ?></h2>
                <h1 class="text-2xl font-bold py-4">User Dashboard</h1>

                <!-- Dashboard Summary Boxes -->
                <div class="flex justify-between px-8">
                    <!-- Total Students Box -->
                    <div class="px-4 py-3 rounded-lg bg-gray-800 text-white shadow-xl my-8 flex flex-col items-center" style="width:300px; height:120px">
                        <i class="ri-graduation-cap-line text-3xl"></i>
                        <h2 class="text-lg font-bold">Total Students</h2>
                        <p class="text-xl"><?php echo $totalStudents; ?></p>
                    </div>

                    <!-- Total Courses Box -->
                    <div class="px-4 py-3 rounded-lg bg-gray-800 text-white shadow-xl my-8 flex flex-col items-center" style="width:300px; height:120px">
                        <img src="../Syllabus.png" alt="Courses" class="w-10 h-10">
                        <h2 class="text-lg font-bold">Total Courses</h2>
                        <p class="text-xl"><?php echo $totalCourses; ?></p>
                    </div>
                </div>

                <!-- Student Table -->
                <div class="mt-8" style="padding-top: 30px;">
                    <table border="1" class="w-full text-left border-collapse border border-gray-600">

                        <thead>
                            <tr class="bg-gray-800 text-white">
                                <th class="px-4 py-2 border border-gray-600">No</th>
                                <th class="px-4 py-2 border border-gray-600">Username</th>
                                <th class="px-4 py-2 border border-gray-600">Full Name</th>
                                <th class="px-4 py-2 border border-gray-600">Email</th>
                                <th class="px-4 py-2 border border-gray-600">Phone Number</th>
                                <th class="px-4 py-2 border border-gray-600">Proficiency</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($studentsResult)) : ?>

                                <tr class="border border-gray-600">
                                    <td class="px-4 py-2"><?php echo $count++; ?></td>
                                    <td class="px-4 py-2"><?php echo $row['Username']; ?></td>
                                    <td class="px-4 py-2"><?php echo $row['FullName']; ?></td>
                                    <td class="px-4 py-2"><?php echo $row['email']; ?></td>
                                    <td class="px-4 py-2"><?php echo $row['pNumber']; ?></td>
                                    <td class="px-4 py-2"><?php echo $row['proficiency']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="hidden" style="padding: 30px 10px 20px 320px;" id="courseManagement">
                <h1 class="text-2xl font-bold py-4 text-yellow-500">Course Management</h1>
                <table border="1" class="w-full text-left border-collapse border border-gray-600">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="px-4 py-2 border border-gray-600">No</th>
                            <th class="px-4 py-2 border border-gray-600">Course Name</th>
                            <th class="px-4 py-2 border border-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        $coursesResults = mysqli_query($conn, "SELECT * FROM course");
                        while ($row = mysqli_fetch_assoc($coursesResults)) : ?>
                            <tr class="border border-gray-600">
                                <td class="px-4 py-2"><?php echo $count++; ?></td>
                                <td class="px-4 py-2"><?php echo $row['course_name']; ?></td>
                                <td class="px-4 py-2">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="submit" class="text-red-500" name="Delete" value="Delete" onclick="return confirm('Are you sure you want to delete this course?')">
                                    </form>

                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <h2 class="text-2xl font-bold py-4">Add Course</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                    <div class="flex flex-col gap-1">
                        <label for="courseName">Course Name:</label>
                        <input type="text" id="courseName" name="courseName" required class="bg-gray-800 text-white px-2 py-1 rounded-sm outline-none">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="courseImage">Course Image:</label>
                        <input type="file" id="courseImage" name="courseImage" accept="image/*" required>
                    </div>
                    <div>
                        <button type="submit" name="submit">Add Course</button>
                    </div>
                </form>
            </div>
            <div class="hidden" style="padding: 30px 10px 20px 320px;" id="feedback">
                <h1 class="text-2xl font-bold py-4 text-yellow-500">User Feedback</h1>
admin page