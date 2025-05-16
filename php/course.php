<?php
session_start();

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

  <link rel="shortcut icon" href="image/spridemy-xicon-01.png" type="x-icon" />

  <!-- remix icon -->

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    integrity="sha512-XcIsjKMcuVe0Ucj/xgIXQnytNwBttJbNjltBV18IOnru2lDPe9KRRyvCXw6Y5H415vbBLRm8+q6fmLUU7DfO6Q=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

  <!-- link css -->

  <link href="../src/output.css" rel="stylesheet" />
  <title>course</title>
</head>

<body>
  <header
    class="bg-black w-full left-0 top-0 z-40 flex flex-col items-center">
    <nav
      class="container flex relative items-center justify-between h-16 z-50 lg:w-full border-b-2">
      <!-- Logo -->
      <div class="text-green-600 font-bold text-lg lg:text-2xl">
        <a href="./home.php">
          <img src="../image/spridemy logo-01-01.png" width="170px">
        </a>
      </div>

      <!-- Navigation Menu -->

      <p href="#" class="nav-link sm:text-sm lg:text-2xl">
        Frontend development
      </p>

      <!-- Hamburger Menu -->
      <div class="sm:hidden lg:flex items-center  mt-4 lg:mt-0">
        <a href="./profile.php">
          <div class="bg-green-700 w-10 text-xl  h-10 rounded-full  text-white flex items-center justify-center font-semibold  ">
            <p class=" pb-[3px] capitalize"><?php echo $firstLetter; ?></p>
          </div>
        </a>
      </div>
    </nav>
  </header>
<!------------ main section  --------------->
  <main class="flex gap-2 h-full">
    <div
      class="bg-gray-800 flex flex-col gap-5 lg:w-[300px] sm:w-12 sticky left-0 overflow-y-auto">
      <div class="container py-3 border-b-2">
        <div class="flex gap-2">
          <img src="../image/Graduate.png" class="w-5" />
          <h2 class="font-bold text-orange-600 sm:hidden lg:block">
            Courses
          </h2>
        </div>
        <p class="font-bold text-xl pt-1 sm:hidden lg:block">
          Frontend Development
        </p>
      </div>
      <div class="flex flex-col gap-3">
        <div
          class="container flex gap-2 cursor-pointer items-center hover:text-gray-300 transition-300 "
          id="outlineList">
          <div
            class="bg-orange-600 rounded-full w-7 h-7 px-3 font-bold text-center">
            1
          </div>
          <p class="sm:hidden lg:block">
            Introduction to Frontend Development
          </p>
        </div>
        <div
          class="flex container gap-2 cursor-pointer hover:text-gray-300 transition-300" id="outlineList">
          <div class="bg-orange-600 rounded-full w-7 h-7 px-3 text-center">
            2
          </div>
          <p class="sm:hidden lg:block">HTML (HyperText Markup Language)</p>
        </div>
        <div
          class="flex container gap-2 cursor-pointer hover:text-gray-300 transition-300" id="outlineList">
          <div class="bg-orange-600 rounded-full w-7 h-7 text-center">3</div>
          <p class="sm:hidden lg:block">CSS (Cascading Style Sheets)</p>
        </div>
        <div
          class="flex container gap-2 cursor-pointer hover:text-gray-300 transition-300" id="outlineList">
          <div class="bg-orange-600 rounded-full w-7 h-7 text-center">4</div>
          <p class="sm:hidden lg:block" id="outlineList">JavaScript Basics</p>
        </div>
        <div
          class="flex container gap-2 cursor-pointer hover:text-gray-300 transition-300" id="outlineList">
          <div class="bg-orange-600 rounded-full w-7 h-7 text-center">5</div>
          <p class="sm:hidden lg:block" id="outlineList">Advanced JavaScript</p>
        </div>
        <div
          class="flex container gap-2 cursor-pointer hover:text-gray-300 transition-300" id="outlineList">
          <div class="bg-orange-600 rounded-full w-7 h-7 text-center">6</div>
          <p class="sm:hidden lg:block" id="outlineList">Frontend Frameworks</p>
        </div>
        <div
          class="flex container gap-2 cursor-pointer hover:text-gray-300 transition-300" id="outlineList">
          <div class="bg-orange-600 rounded-full w-7 h-7 px-3 text-center">
            7
          </div>
          <p class="sm:hidden lg:block" id="outlineList">Version Control and Deployment</p>
        </div>
      </div>
    </div>
    <div
      class="container flex items-center flex-col gap-4 flex-1 overflow-y-auto">
      <div class="container bg-orange-600 rounded-sm px-3 py-1 w-full mt-10">
        <h2 class="lg:text-xl sm:text-sm text-white font-bold" id="heads">

        </h2>
      </div>
      <div
        class="lg:w-[80%] sm:w-[90%] py-5 border-b-2 flex flex-col gap-2 sm:text-sm lg:text-lg">
        <video
          id="video"
          src="../VIDEO/Frontend-web-development-a-complete-overview-2021.mp4"
          controls></video>
        <div class="flex flex-col gap-2">
          <h2 class="" id="Hdesc">

          </h2>
          <h2 class="text-orange-600 font-bold lg:text-xl sm:text-sm">
            Main concepts
          </h2>
          <p class="font-bold lg:text-xl sm:text-sm" id="Ldesc">

          </p>

          <p class="container" id="L1desc">


          </p>
          <p class="font-bold lg:text-xl sm:text-sm" id="L2Head"></p>

          <p class="container" id="L2desc">


          </p>
          <p class="font-bold lg:text-xl sm:text-sm" id="L3Head"></p>

          </p>

          <p class="container" id="L3desc">


          </p>
        </div>
      </div>
