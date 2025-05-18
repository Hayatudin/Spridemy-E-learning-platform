<?php

include "./navbar.php";

if (isset($_POST['submit'])) {

  $Fullname = $_POST['Fullname'];
  $email = $_POST['Email'];
  $pNumber = $_POST['Phone'];
  $proficiency = $_POST['Proficiency'];

  $Username = $_SESSION['Username'];

  $query = "UPDATE studentinfo SET FullName = '$Fullname', email = '$email', pNumber = '$pNumber', proficiency = '$proficiency' WHERE Username = '$Username' ";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo '<script>
            alert("Profile updated successfully");
            header("Location: ./profile.php");
          </script>';
  }
}

if (isset($_POST['logout'])) {
  session_destroy();

  echo '<script>
            window.location.href = "../src/index.php";
        </script>';
  exit();
}

?>

<div class="container">
  <div class=" mb-8 lg:mb-8 mt-12 py-4 border-b-2">
    <h2 class="font-bold text-2xl lg:text-3xl">Profile & settings</h2>

  </div>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="flex flex-col gap-2">
      <div class="flex sm:flex-col lg:flex-row gap-4 ">
        <div class="flex flex-col lg:w-1/2 sm:w-full gap-1">
          <label for="Fname">Full Name</label>
          <input type="text" class="px-3 py-1 bg-slate-800 rounded-sm text-sm w-2/3 sm:w-full" placeholder="Full name" name="Fullname">
        </div>
        <div class="flex flex-col lg:w-1/2 sm:w-full gap-1">
          <label for="Email">Email</label>
          <input type="Email" class="px-3 py-1 bg-slate-800 rounded-sm text-sm" placeholder="Email" name="Email">
        </div>

      </div>
      <div class="flex sm:flex-col lg:flex-row gap-4 ">

        <div class="flex flex-col lg:w-1/2 sm:w-full gap-1">
          <label for="Phone">Phone number</label>
          <input type="text" class="px-3 py-1 bg-slate-800 rounded-sm text-sm" placeholder="Phone number" name="Phone">
        </div>

        <div class="flex flex-col lg:w-1/2 sm:w-full gap-1">
          <label for="Profeincy">Proficiency</label>
          <input type="text" class="px-3 py-1 bg-slate-800 rounded-sm text-sm" placeholder="Proficiency" name="Proficiency">
        </div>
      </div>

      <div class="flex justify-between">
        <input type="submit" name="submit" id="submit" value="update" class="bg-yellow-500 px-3 py-1 rounded-sm mt-6 w-28">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
          <input type="submit" name="logout" value="Logout" class="bg-red-500 px-3 py-1 rounded-sm">
        </form>
      </div>
    </div>
  </form>
</div>

<?php include "./footer.php"; ?>

<script src="../index.js"></script>
<script src="../road.js"></script>

</body>

</html>