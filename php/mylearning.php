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
<!---------------- main section  ------------------->

<main class="min-h-full">
  <div class="flex items-center justify-evenly mt-7 mb-2 z-50">
    <div
      class="flex flex-row items-center gap-2 cursor-pointer pb-1" id="courseBtn">
      <img src="../image/Online course.png" class="w-5 sm:w-8" />
      <h2 class="hidden lg:block font-bold text-xl">My course</h2>
    </div>

    <div
      class="flex flex-row items-center gap-2 cursor-pointer pb-1" id="resourceBtn">
      <img src="../image/Bar graph.png" class="w-5 sm:w-8" />
      <h2 class="hidden lg:block font-bold text-xl">Available Resources</h2>
    </div>

    <div
      class="flex flex-row items-center gap-2 cursor-pointer pb-1" id="beyondBtn">
      <img src="../image/Quality.png" class="w-5 sm:w-8" />
      <h2 class="hidden lg:block font-bold text-xl">Beyond Basics</h2>
    </div>

  </div>

  <!-- course section  -->
  <div
    class=" bg-gray-900 w-full grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 px-8 gap-6 justify-center courseBox pb-8" id="course-container">
    <!-- <div class="flex flex-col items-center gap-2"> -->
    <?php if (!empty($enrolled_course)): ?>
      <?php foreach ($enrolled_course as $course): ?>
        <div class="flex flex-col sm:my-3 items-center bg-gray-800 transition-300 w-[90%] px-1 py-1 rounded-lg">
          <img src="./view_image.php?id=<?php echo $course['course_id']; ?>" alt="Course Image" draggable="false" />
          <div class="flex flex-col sm:my-3 items-center gap-2 w-[90%] ">

            <p class="text-xl font-bold mt-1 md:text-lg"><?php echo $course['course_name']; ?></p>
            <div class="flex items-center gap-2 self-end">
              <p>4.8</p>
              <img
                draggable="false"
                class="w-16"
                src="../thumbnail/rate.png" />
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
              <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
              <input type="submit" name="continue" value="Continue" class="bg-white text-black px-4 rounded-sm py-1 cursor-pointer" />
            </form>
          </div>

        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-gray-600" style="min-height: 100px;">You haven't enrolled in any courses yet.</p>
    <?php endif; ?>
  </div>
  <!-- resource section  -->

  <div class=" bg-gray-900 flex flex-col gap-2 items-center hidden" id="resource-container">
    <h1 class="font-bold text-2xl text-yellow-500 py-1">Available Resources</h1>

    <!-- Resource List -->
    <div class="resource-list">
      <ul id="resource-list" class="w-full grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 justify-center ">

      </ul>
    </div>
  </div>
  <!-- beyond basic section  -->

  <div class=" bg-gray-900 w-full min-h-8 h-full flex items-center justify-center hidden" id="beyond-container" style="padding: 90px 0;">
    <h1 class="text-green-500 font-bold text-3xl ">COMING SOON.......</h1>
  </div>
  </div>
</main>
<?php include "./footer.php"; ?>

<!--------------------- link js ------------------->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>

<script src="../index.js"></script>
<script src="../mylearn.js"></script>
<script src="../road.js"></script>
</body>
<?php $conn->close(); ?>

</html>