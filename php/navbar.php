<?php
include "./connect.php";

if (isset($_SESSION['Username'])) {
    $firstLetter = substr($_SESSION['Username'], 0, 1);
} else {
    $firstLetter = '';
}



$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : 'Guest';
$proficiency = isset($_SESSION['proficiency']) ? $_SESSION['proficiency'] : 'Unknown';
$Pnum = isset($_SESSION['Pnum']) ? $_SESSION['Pnum'] : 'Not provided';

$sql = "select Username, FullName from studentinfo where Username = '$Username' ";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $FullName = $row['FullName'];
} else {
    $FullName = '';
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- link x-icon -->
    <link rel="shortcut icon" href="../image/spridemy-xicon-01.png" type="x-icon" />

    <!-- remix icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" integrity="sha512-XcIsjKMcuVe0Ucj/xgIXQnytNwBttJbNjltBV18IOnru2lDPe9KRRyvCXw6Y5H415vbBLRm8+q6fmLUU7DfO6Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- link css -->
    <link href="../src/output.css" rel="stylesheet" />

    <!-- Add the fixed nav CSS -->
    <style>
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.11);
            box-shadow: 0 0 15px #72a1de98;
        }

        body {
            padding-top: 64px;
            /* Adjust based on nav height */
        }
    </style>

    <title>Spridemy online learning</title>
</head>

<body class="bg-black text-white">
    <!--------------------Header ---------------->
    <header class="bg-black w-full left-0 top-0 z-40 flex flex-col items-center">
        <nav class="px-8 flex items-center justify-between h-16 z-30 lg:w-full">
            <!-- Logo -->
            <div class="px-8">
                <a href="./home.php">
                    <img src="../image/spridemy logo-01-01.png" width="170px" />
                </a>
            </div>
            <!-- Search Bar -->
            <div class="flex sm:flex-col lg:flex-row items-center w-full lg:w-auto relative lg:px-8">
                <!-- Search Input -->
                <form action="./search.php" method="post">
                    <input type="search" name="searchInput" placeholder="Search courses..." class="absolute top-12 left-0 w-full px-4 py-2 bg-slate-800 lg:rounded-l-full text-sm opacity-0 transition-opacity duration-300 lg:relative lg:opacity-100 lg:w-auto lg:top-0 lg:left-auto lg:py-1 lg:px-3 lg:block lg:text-lg outline-none" id="search-input" />
                    <!-- Search Icon -->
                </form>
                <div>
                    <i class="ri-search-line text-lg cursor-pointer lg:bg-slate-800 lg:px-4 lg:py-[9px] lg:rounded-r-full" id="search"></i>
                </div>
            </div>
            <!-- Navigation Menu -->
            <div class="absolute top-0 left-[-100%] w-full h-screen backdrop-blur-lg overflow-hidden flex items-center justify-center duration-300 lg:static lg:h-auto lg:bg-transparent lg:w-auto lg:flex-row" id="nav-menu">
                <ul class="flex flex-col items-center justify-center gap-8 lg:flex-row">
                    <li>
                        <a href="./home.php" class="nav-link cursor-pointer font-bold text-lg">Explore</a>
                    </li>

                    <!-- Mega Menu -->
                    <ul class="flex flex-col items-center justify-center gap-8 lg:flex-row">

                        <!-- Mega Menu -->
                        <li id="roadmap-link" class="group nav-links cursor-pointer font-bold text-lg">
                            Roadmap
                        </li>


                        <li>
                            <a href="./mylearning.php" class="nav-link cursor-pointer font-bold text-lg">My Learning</a>
                        </li>

                        <li class="lg:hidden sm:block">
                            <a href="./profile.php" class="nav-link cursor-pointer font-bold text-lg">Profile</a>
                        </li>

                        <div class="sm:hidden lg:flex items-center mt-4 lg:mt-0">
                            <a href="./profile.php" class="z-50">
                                <div class="bg-green-600 text-xl rounded-full text-white flex items-center justify-center font-semibold " style="width: 35px; height: 35px;">
                                    <p class="pb-[3px] capitalize"><?php echo $firstLetter; ?></p>
                                </div>
                            </a>
                        </div>
                    </ul>
            </div>
            <div id="mega-menu" class="absolute top-14 left-0 w-full bg-gray-800 shadow-lg rounded-lg p-6 gap-8 flex justify-evenly items-start z-50 hidden text-center">
                <!-- Column 1 -->
                <div class="w-1/3">
                    <h3 class="font-bold text-xl mb-4 text-yellow-500">Development</h3>
                    <ul class="space-y-2">
                        <li><a href="./roadmap.php" class="block hover:text-yellow-500">Frontend Development</a></li>
                        <li><a href="#" class="block hover:text-yellow-500">Backend Development</a></li>
                        <li><a href="#" class="block hover:text-yellow-500">Application Development</a></li>
                    </ul>
                </div>

                <!-- Column 2 -->
                <div class="w-1/3">
                    <h3 class="font-bold text-xl mb-4 text-yellow-500">Specializations</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="block hover:text-yellow-500">AI & Data Science</a></li>
                        <li><a href="#" class="block hover:text-yellow-500">UI/UX Design</a></li>
                        <li><a href="#" class="block hover:text-yellow-500">Cyber Security</a></li>
                    </ul>
                </div>
            </div>

            <!-- Hamburger Menu -->
            <div class="text-2xl cursor-pointer z-50 lg:hidden">
                <i class="ri-menu-3-line" id="Hamburger"></i>
            </div>
        </nav>