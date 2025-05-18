<?php include "./navbar.php" ?>

<div class="w-full roadmap h-24 pt-3 pb-3">
  <!-- Hero Section -->
  <div
    class="container flex flex-col gap-1 sm:items-center sm:justify-center lg:items-start">
    <h2 class="text-2xl font-bold">Frontend development Roadmap</h2>
    <p class="roadDesc text-gray-500 sm:text-center">
      Explore the step-by-step journey of our online learning program,
      designed to guide you from start to mastery.
    </p>
  </div>
</div>
</header>

<!--------------------- main sectio ---------------->
<main class="container mt-6 mb-6">
  <div class="container mx-auto py-10">
    <div class="relative">
      <!-- Vertical Line -->
      <div
        class="absolute lg:left-1/2 lg:transform lg:-translate-x-1/2 h-full border-l-2 border-white sm:left-0"></div>

      <!-- Timeline Items -->
      <div class="flex flex-col gap-10 sm:gap-7">
        <!-- Timeline Item 1 -->
        <div
          class="flex flex-col items-center lg:flex-row lg:items-start lg:space-x-6 lg:mb-10">
          <div class="hidden lg:block lg:w-1/2"></div>
          <div class="lg:w-1/2">
            <div class="p-6 rounded-md shadow-lg">
              <img
                src="../lists/internet-01.png"
                draggable="false"
                class="w-full" />
            </div>
          </div>
        </div>

        <!-- Timeline Item 2 -->
        <div
          class="flex flex-col-reverse items-center lg:flex-row-reverse lg:items-start lg:space-x-6 lg:space-x-reverse lg:mb-10">
          <div class="hidden lg:block lg:w-1/2"></div>
          <div class="lg:w-1/2">
            <div class="p-6 rounded-md shadow-lg">
              <img
                src="../lists/HTML-01.png"
                draggable="false"
                class="w-full" />
            </div>
          </div>
        </div>
        <!-- Timeline Item 3 -->
        <div
          class="flex flex-col items-center lg:flex-row lg:items-start lg:space-x-6 lg:mb-10">
          <div class="hidden lg:block lg:w-1/2"></div>
          <div class="lg:w-1/2">
            <div class="p-6 rounded-md shadow-lg">
              <img
                src="../lists/css-01.png"
                draggable="false"
                class="w-full" />
            </div>
          </div>
        </div>

        <!-- Timeline Item 4 -->
        <div
          class="flex flex-col-reverse items-center lg:flex-row-reverse lg:items-start lg:space-x-6 lg:space-x-reverse lg:mb-10">
          <div class="hidden lg:block lg:w-1/2"></div>
          <div class="lg:w-1/2">
            <div class="p-6 rounded-md shadow-lg">
              <img src="../lists/js-01.png" draggable="false" class="w-full" />
            </div>
          </div>
        </div>

        <!-- Timeline Item 5 -->
        <div
          class="flex flex-col items-center lg:flex-row lg:items-start lg:space-x-6 lg:mb-10">
          <div class="hidden lg:block lg:w-1/2"></div>
          <div class="lg:w-1/2">
            <div class="p-6 rounded-md shadow-lg">
              <img src="../lists/VC-01.png" draggable="false" class="w-full" />
            </div>
          </div>
        </div>

        <!-- Timeline Item 6 -->
        <div
          class="flex flex-col-reverse items-center lg:flex-row-reverse lg:items-start lg:space-x-6 lg:space-x-reverse lg:mb-10">
          <div class="hidden lg:block lg:w-1/2"></div>
          <div class="lg:w-1/2">
            <div class="p-6 rounded-md shadow-lg">
              <img
                src="../lists/Framework-01.png"
                draggable="false"
                class="w-full" />
            </div>
          </div>
        </div>
        <!-- Timeline Item 7 -->
        <div
          class="flex flex-col items-center lg:flex-row lg:items-start lg:space-x-6 lg:mb-10">
          <div class="hidden lg:block lg:w-1/2"></div>
          <div class="lg:w-1/2">
            <div class="p-6 rounded-md shadow-lg">
              <img
                src="../lists/responsive-01.png"
                draggable="false"
                class="w-full" />
            </div>
          </div>
        </div>

        <!-- Timeline Item 8 -->
        <div
          class="flex flex-col-reverse items-center lg:flex-row-reverse lg:items-start lg:space-x-6 lg:space-x-reverse lg:mb-10">
          <div class="hidden lg:block lg:w-1/2"></div>
          <div class="lg:w-1/2">
            <div class="p-6 rounded-md shadow-lg">
              <img
                src="../lists/project-01.png"
                draggable="false"
                class="w-full" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container text-center courses pb-5">
    <h2 class="sm:text-sm lg:text-2xl lg:px-5 pt-5 pb-5">
      Our website provides a clear, step-by-step roadmap from learning the
      basics to mastering advanced techniques.
    </h2>
    <input
      type="submit"
      value="Explore careers"
      class="bg-orange-600 px-5 py-2 rounded-sm mt-2 sm:text-sm sm:py-3 sm:py-2 mb-5" />
  </div>
</main>

<?php include "./footer.php"; ?>

<script src="../road.js"></script>
<script src="../index.js"></script>
</body>

</html>