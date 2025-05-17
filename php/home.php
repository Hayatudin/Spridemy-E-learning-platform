<?php
include "./navbar.php";

$query = "SELECT * FROM course";
$result = mysqli_query($conn, $query);

if (isset($_POST['comment'])) {
  if (isset($_POST['commentarea']) && !empty($_POST['commentarea'])) {
    $user = $_SESSION['Username'];
    $comment = $_POST['commentarea'];
    $sql_user = "SELECT comment FROM studentinfo WHERE Username = '$user'";
    $result_user = mysqli_query($conn, $sql_user);
    $row_user = mysqli_fetch_assoc($result_user);

    if (mysqli_num_rows($result_user) === 0) {
      echo "No matching user found in the database.";
    } else {
      $sql = "UPDATE studentinfo SET comment = '$comment' WHERE Username = '$user'";
      $sqli_query = mysqli_query($conn, $sql);
      if ($sqli_query) {
        echo " <script> Alert('Comment updated successfully'); </script> ";
      } else {
        echo " <script> Alert('Error updating comment: " . mysqli_error($conn) . "'); </script>";
      }
    }
  }
}

?>

<div
  class="container relative w-full h-[90vh] flex box-border sm:flex-col items-center justify-end lg:flex-row mix-blend-lighten"
  id="hero-section">
  <video autoplay loop muted plays-inline class="absolute top-0 right-0 -z-1 lg:w-full sm:w-auto h-fit " src="../VIDEO/galaxy.mp4"></video>
  <div class="absolute w-full -z-1 top-0 mix-blend-lighten flex items-center justify-center">
    <video autoplay loop muted plays-inline class="" style="margin-top: -19.5%; width:70%; " src="../VIDEO/blackhole.mp4"></video>
  </div>
  <div class="lg:w-1/2 flex items-center flex-col ">
    <h2 class="text-center font-bold text-2xl lg:text-4xl z-50">
      Learn faster retain longer with
      <span class="text-yellow-500">Spridemy.</span>
    </h2>
    <div class="flex items-center gap-4 mt-4 z-50">
      <a href="#course-id">
        <button class="bg-transparent px-5 py-1 rounded-sm border-none hover:bg-yellow-500 hover:cursor-pointer sm:text-[12px] lg:text-[18px]" id="Explore-hero" style="border: 0.7px solid grey;">Explore careers</button>
      </a>
      <a href="#course-id">
        <button class="bg-gray-800 px-5 py-1 rounded-sm border-none hover:bg-slate-700 hover:cursor-pointer sm:text-[12px] lg:text-[18px]"
          id="Explore-hero">Get started</button>
      </a>
    </div>
  </div>
  <div class="sm:w-[80%] lg:w-1/2 z-0">
    <div class="flex items-center justify-center">
      <img
        draggable="false"
        src="../hero.png"
        alt=""
        class="lg:w-[400px] md:w-[250px]" />
    </div>

  </div>
</div>
</header>

<main>
  <!-------------------- counting number --------------->
  <section
    class="w-full relative bg-gray-800 flex items-center py-5 h-fit z-30">
    <div
      class="flex justify-between w-full sm:flex-col items-center gap-2 text-right p-4 lg:flex-row lg:justify-center lg:gap-4 lg:py-3  box-border overflow-hidden">
      <div
        class="flex boxes flex-col items-center gap-2 py-2 my-2 lg:w-1/5">
        <img
          draggable="false"
          class="w-5"
          src="../icons/Knowledge.png"
          alt="" />
        <div class="flex items-center ">
          <h2 class="text-2xl font-bold sm:text-3xl contain" data-num="10" id="numb">0</h2>
          <h2 class="text-2xl font-bold sm:text-3xl">+</h2>
        </div>

        <p>courses</p>
      </div>
      <div class="flex boxes flex-col items-center gap-2 py-2 lg:w-1/5">
        <img
          draggable="false"
          class="w-5"
          src="../icons/Graduate.png"
          alt="" />
        <div class="flex items-center ">
          <h2 class="text-2xl font-bold sm:text-3xl" data-num="1000" id="numb">0</h2>
          <h2 class="text-2xl font-bold sm:text-3xl">+</h2>
        </div>
        <p>Students</p>
      </div>
      <div class="flex boxes flex-col items-center gap-2 py-2 lg:w-1/5">
        <img draggable="false" class="w-5" src="../icons/Teacher.png" alt="" />
        <div class="flex items-center ">
          <h2 class="text-2xl font-bold sm:text-3xl" data-num="10" id="numb">0</h2>
          <h2 class="text-2xl font-bold sm:text-3xl">+</h2>
        </div>
        <p>Teacher</p>
      </div>
      <div
        class="flex boxes flex-col items-center gap-2 py-2 border-none lg:w-1/5">
        <img draggable="false" class="w-5" src="..//icons/Trophy.png" alt="" />
        <div class="flex items-center ">
          <h2 class="text-2xl font-bold sm:text-3xl" data-num="95" id="numb">0</h2>
          <h2 class="text-2xl font-bold sm:text-3xl">%</h2>
        </div>
        <p>Success rate</p>
      </div>
    </div>
  </section>
  <!-------------------- courses --------------->
  <section class=" flex flex-col items-center gap-2 mb-4" id="course-id">
    <div class="flex items-center gap-2 py-2">
      <img draggable="false" src="../icons/Mask group.png" alt="" />
      <h4 class="text-yellow-500 font-bold">Our courses</h4>
    </div>
    <h2 class="text-2xl font-bold">Explore our categories</h2>
    <p class="text-center w-[90%] category">
      Discover a world of coding possibilities! Our carefully curated
      categories cover everything empowering you to learn and grow in your
      chosen tech career.
    </p>

    <div class="px-12 w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center" id="courseContainer">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="flex flex-col sm:my-3 items-center bg-gray-800 transition-300 w-[90%] px-1 py-1 rounded-lg">

          <img src="./view_image.php?id=<?php echo $row['id']; ?>" alt="image not found" draggable="false" />
          <div class="flex flex-col sm:my-3 items-center gap-2 w-[90%] ">

            <p class="text-xl font-bold mt-1 md:text-lg"><?php echo $row['course_name']; ?></p>
            <div class="flex items-center gap-2 self-end">
              <p>4.8</p>
              <img
                draggable="false"
                class="w-16"
                src="../thumbnail/rate.png"
                alt="" />
            </div>
            <form action="./mylearning.php" method="POST">
              <!-- <input type="hidden" name="course_image" value="<?php echo $row['images']; ?>"> -->
              <input type="hidden" name="course_name" value="<?php echo $row['course_name']; ?>">
              <input type="hidden" name="course_id" value="<?php echo $row['id']; ?>">
              <input type="submit" name="Enroll" value="Enroll now" class="bg-white text-black px-4 rounded-sm py-1 cursor-pointer" />
            </form>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

  </section>
  <!---------------- certificate  ----------------->

  <section class="flex sm:flex-col lg:flex-row gap-2 item-center justify-center my-12 py-6 lg:px-12 px-4 w-full">
    <div class=" sm:w-full flex flex-col items-start justify-center gap-8 p-4 lg:w-[60%]">
      <h2 class="text-2xl font-bold ">Earn <span class="text-yellow-500">certification</span> with step-by-step coding courses </h2>
      <div class=" flex items-center gap-4 w-full">
        <div class="flex items-center gap-2 ">
          <img src="../image/opportunity (1).png" class="w-10" alt="">
          <p class="text-sm">Career Opportunities</p>
        </div>
        <div class="flex items-center gap-2 ">
          <img src="../image/engagement (1).png" class="w-10" alt="">
          <p class="text-sm">Learning Engagement</p>
        </div>
        <div class="flex items-center gap-2 ">
          <img src="../image/growth (2).png" class="w-10" alt="">
          <p class="text-sm">Personal Growth</p>
        </div>
      </div>
    </div>
    <div class=" sm:w-[80%] flex justify-center lg:w-[40%]">
      <img src="../image/spridemy certificate-01.jpg" class=" shadow-lg">
    </div>
  </section>
