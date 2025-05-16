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
