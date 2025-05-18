 <?php

    if (isset($_POST['submitIn'])) {

        include "./connect.php";

        $adminUname = 'hayu';
        $adminPass = '1234';

        $_SESSION['adminUname'] = $adminUname;

        $Username = $_POST['Username'];
        $password = $_POST['password'];

        if ($Username === $adminUname && $password === $adminPass) {

            $_SESSION['adminPanel'] = true;
            $_SESSION['Username'] = $Username;

            header("Location: ./admin.php");
            exit();
        } else {
            $sql = "select * from studentinfo where Username = '$Username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($row) {

                if (password_verify($password, $row["password"])) {
                    $_SESSION['Username'] = $Username;
                    header("location: ./home.php");
                    exit();
                    
                } else {
                    echo "<script>alert('The username or password is incorrect');</script> ";
                }
            } else {
                echo "<script>alert('Couldn't get that username');</script> ";
            }
        }
    }

    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <style>
         html,
         body {
             height: 100%;
         }
     </style>
     <link href="../src/output.css" rel="stylesheet" />
     <title>Spridemy online learning</title>
 </head>
 
 <body class=" flex items-center justify-center sm:my-3 lg:my-0 bg-black">
     <div
         class="flex gap-2 container  bg-white rounded-lg text-black py-2 px-2 items-center w-[70%] h-[80%]">

         <div class="lg:container h-full transition-300 py-32 ">

             <p class="text-xl font-bold text-center mb-6 text-blue-700">Login to your account</p>
             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                 <div class="flex flex-col mb-2 items-start ">
                     <label class="font-semibold ml-20" for="fullname">Username</label><br>
                     <input class="w-[70%] px-2 py-1 bg-slate-100 rounded-sm mx-auto" type="text" placeholder="Username" name="Username" />
                 </div>
                 <div class="flex flex-col mb-2 items-start">
                     <label class="font-semibold ml-20" for="Password">Password</label><br>
                     <input class="w-[70%] px-2 py-1 bg-slate-100 rounded-sm mx-auto" type="password" placeholder="password" name="password" />
                 </div>



                 <div class="flex flex-col gap-1 items-center mt-4">
                     <input class="px-10 py-1 bg-orange-600 rounded-full text-white font-semibold cursor-pointer self-center" type="submit" value="Sign in" name="submitIn" />

                     <div class="flex">
                         <p>don't have an account?</p>
                         <a href="./signup.php" class="text-blue-800 font-bold">Sign up</a>
                     </div>
                 </div>
             </form>
         </div>
         <div
             class="h-full text-white sm:hidden lg:flex flex-col items-center gap-12 text-center left-0 rounded-lg py-40 container w-[45%] transition-300"
             style=" background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../image/bg.jpg'); background-size: cover; ">

             <div class="flex flex-col gap-2">
                 <h2 class="text-3xl font-bold">Welcome Back!</h2>
                 <p class="text-sm text-gray-400">To keep connected with us please login with your <br> personal info</p>
             </div>
             <a href="../src/index.php">
                 <img src="../image/spridemy logo-01-01.png" width="170px" class="bottom-3" />
             </a>
         </div>
     </div>


 </body>

 </html>