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

<div
  class="container bg-gray-800 rounded-lg pt-5 pb-5 profile flex w-[80%] lg:justify-between mt-24 mb-7 !important" style="margin: 40px 0 10px 0;">

  <div class="flex gap-2 lg:gap-3" style="background-image: url('../image/code.png'); background-size: contain; background-position: right; background-repeat:no-repeat;">

    <a href="./profile.php">
      <div class="text-xl rounded-full  text-white flex items-center justify-center font-semibold  " style="background-color: green; width: 35px; height: 35px;">
        <p class=" pb-[3px] capitalize"><?php echo $firstLetter; ?></p>
      </div>
    </a>
    <div class="">
      <h2 class="font-bold lg:text-3xl sm:text-xl">
        <?php
        echo $user_row['FullName'];
        ?>
      </h2>
      <p class=" " style="font-size: 8px">
        <?php echo $user_row['proficiency'] ?>
      </p>
      <div class="flex items-center text-orange-600">
        <i class="ri-cellphone-fill"></i>
        <p class="text-green-600 font-bold text-sm lg:text-lg">
          <?php echo $user_row['pNumber'] ?>
        </p>
      </div>

      <div class="flex items-center gap-2">
        <p class="text-sm">4.9</p>
        <img src="../image/stars.png" class="w-20" draggable="false" />
      </div>
    </div>
  </div>
  <a href="./profile.php">
    <i class="ri-file-edit-line cursor-pointer hover:text-orange-600 right-0 text-xl"></i>
  </a>
</div>
</header>
