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

