<?php
include "../php/connect.php";

$query = "SELECT * FROM course";
$result = mysqli_query($conn, $query);

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

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    integrity="sha512-XcIsjKMcuVe0Ucj/xgIXQnytNwBttJbNjltBV18IOnru2lDPe9KRRyvCXw6Y5H415vbBLRm8+q6fmLUU7DfO6Q=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

  <!-- link css -->

  <link href="./output.css" rel="stylesheet" />
  <title>Spridemy online learning</title>
</head>
<body class="">
  <!--------------------Header --------------->
  <header
    class="bg-black w-full left-0 top-0 z-40 flex flex-col items-center">
    <nav
      class="px-8 flex relative items-center justify-between h-16 z-50 lg:w-full " style="background-color: rgba(255, 255, 255, 0.07); box-shadow: 0 0 15px #72a1de98">
      <!-- Logo -->
      <div class="px-8">
        <a href="#">
          <img src="../spridemy logo-01-01.png" width="170px" />
        </a>
      </div>

      <!-- Search Bar -->
      <div
        class="flex sm:flex-col lg:flex-row items-center w-full lg:w-auto relative lg:px-8">
        <!-- Search Input -->
        <input
          type="search"
          placeholder="Search courses..."
          class="absolute hidden top-12 left-0 w-full px-3 py-2 bg-slate-800 lg:rounded-l-full text-sm opacity-0 transition-opacity duration-300 lg:relative lg:opacity-100 lg:w-auto lg:top-0 lg:left-auto lg:py-1 lg:px-3 lg:block lg:text-lg"
          id="search-input" />
        <!-- Search Icon -->
        <div>
          <i
            class="ri-search-line text-lg cursor-pointer lg:bg-slate-800 lg:px-4 lg:py-[9px] lg:rounded-r-full"
            id="search"></i>
        </div>
      </div>

      <!-- Navigation Menu -->
      <div
        class="absolute top-0 left-[-100%] w-full h-screen backdrop-blur-lg overflow-hidden flex items-center justify-center duration-300 lg:static lg:h-auto lg:bg-transparent lg:w-auto lg:flex-row"
        id="nav-menu">
        <ul
          class="flex flex-col items-center justify-center gap-8 lg:flex-row">
          <li>
            <a href="#" class="nav-link">Explore</a>
          </li>
          <li>
            <p
              class="nav-links cursor-pointer font-bold text-lg"
              id="roadmap" onclick="alert('Please sign up or Log in first!')">
              Roadmap
            </p>
          </li>
          <li>
            <a href="#" class="nav-link" onclick="alert('please sign up or login first')">My learning</a>
          </li>
          <div class="flex items-center gap-4 mt-4 lg:mt-0">
            <a href="../php/signin.php">
              <button
                type="button"

                class="bg-gray-800 px-5 py-1 rounded-full border-none hover:bg-slate-700 hover:cursor-pointer"
                id="sign">log in</button>
            </a>
            <a href="../php/signup.php">
              <button
                type="button"

                class="bg-yellow-500 px-5 py-1 rounded-full border-none hover:bg-yellow-400 hover:cursor-pointer"
                id="sign">Sign up</button>
            </a>
          </div>
        </ul>
      </div>

      <!-- Hamburger Menu -->
      <div class="text-2xl cursor-pointer z-50 lg:hidden">
        <i class="ri-menu-3-line" id="Hamburger"></i>
      </div>
    </nav>

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

            <img src="../php/view_image.php?id=<?php echo $row['id']; ?>" alt="image not found" draggable="false" />
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
              <form>
                <!-- <input type="hidden" name="course_image" value="<?php echo $row['images']; ?>"> -->
                <input type="hidden" name="course_name" value="<?php echo $row['course_name']; ?>">
                <input type="hidden" name="course_id" value="<?php echo $row['id']; ?>">
                <input type="submit" name="Enroll" value="Enroll now" class="bg-white text-black px-4 rounded-sm py-1 cursor-pointer" onclick="alert('Please sign up or Log in first!')" />
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