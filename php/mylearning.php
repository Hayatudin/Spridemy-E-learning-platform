<?php

include "./navbar.php";

$Username = $_SESSION['Username'];
if (isset($Username)) {
  $firstLetter = substr($_SESSION['Username'], 0, 1);
  $sql = "SELECT * FROM studentinfo WHERE Username = '$Username'";
  $sql_result = mysqli_query($conn, $sql);

  $user_row = mysqli_fetch_assoc($sql_result);
} else {
  die("Error: User not logged in. Please log in again.");
}


// enroll courses 
if (isset($_POST['Enroll']) && isset($_POST['course_id'])) {
  $course_id = $_POST['course_id'];

  $check_sql = "SELECT * FROM enrolled_course WHERE Username = '$Username' AND course_id = '$course_id'";
  $check_result = mysqli_query($conn, $check_sql);

  if (!$check_result) {
    die("Error checking enrollment: " . mysqli_error($conn));
  }

  $mysql = "SELECT * FROM course WHERE id = '$course_id'";
  $myResult = mysqli_query($conn, $mysql);
  $Cname = mysqli_fetch_assoc($myResult);
  $course_name = $Cname ? $Cname['course_name'] : '';
  $course_image = $Cname ? $Cname['course_name'] : null;

  if (mysqli_num_rows($check_result) == 0 && $course_name && $course_image) {
    $insert_sql = "INSERT INTO enrolled_course (Username, course_id, course_name, course_image) 
               VALUES ('$Username', '$course_id', '$course_name', '$course_image')";
    mysqli_query($conn, $insert_sql);
  }
}

$course_ids = [];
$fetch_enrolled = "SELECT * FROM enrolled_course WHERE Username = '$Username'";
$enrolled_result = mysqli_query($conn, $fetch_enrolled);

while ($row = mysqli_fetch_assoc($enrolled_result)) {
  $course_ids[] = $row['course_id'];
}

$enrolled_course = [];
if (!empty($course_ids)) {
  $fetch_courses = "SELECT * FROM enrolled_course WHERE Username = '$Username'";
  $course_result = mysqli_query($conn, $fetch_courses);

  while ($row = mysqli_fetch_assoc($course_result)) {
    $enrolled_course[] = $row;
  }
}

if (isset($_POST['continue'])) {
  $course_id = $_POST['course_id'];

  if ($course_id == 1) {
    echo '<script>
      window.location.href = "./course.php";
      </script>';
    exit();
  }
}

?>