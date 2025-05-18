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