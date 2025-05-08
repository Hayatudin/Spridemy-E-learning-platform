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