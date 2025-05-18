<?php
include "./connect.php";

if (isset($_POST['submitUp'])) {
    $Fullname = $_POST['Fname'];
    $Username = $_POST['Username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['Pnum'];
    $proficiency = $_POST['Proficiency'];

    $sql = "select * from studentinfo where Username = '$Username'";
    $result = mysqli_query($conn, $sql);
    $count_user = mysqli_num_rows($result);

    if ($count_user == 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $_SESSION['password'] = $hash;
        $sql = "insert into studentinfo(Username, Fullname, email, password, pNumber, proficiency, comment) VALUES ('$Username','$Fullname' , '$email', '$hash', '$phoneNumber', '$proficiency', 'not defined')";
        $result = mysqli_query($conn, $sql);
        header("Location: ./signin.php");
    } else {

        echo '<script>
            alert("the user already exist! please try to use another username");
        </script>';
    }

    $_SESSION['proficiency'] = $proficiency;
    $_SESSION['Pnum'] = $phoneNumber;
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

<body class="bg-black flex items-center justify-center sm:my-3 lg:my-0">
    <div
        class="flex gap-2 container  bg-white rounded-lg text-black py-2 px-2 items-center w-[70%] h-[80%]">
        <div
            class="h-full text-white sm:hidden lg:flex flex-col items-center gap-12 text-center left-0 rounded-lg py-40 container w-[40%] "
            style=" background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../image/bg.jpg'); background-size: cover; ">

            <div class="flex flex-col gap-2 p-1">
                <h2 class="text-3xl font-bold">Hello, Friend!</h2>
                <p class="text-sm text-gray-400">Enter your personal detail to start a journey <br> with us</p>
            </div>

            <a href="../index.html">
                <img src="../image/spridemy logo-01-01.png" width="170px" class="bottom-3" />
            </a>
        </div>
        <div class="container py-10 h-full w-[60%] ">
            <p class="text-xl font-bold text-center">Create account</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="flex sm:flex-col lg:flex-row gap-4 w-full">
                    <div class="flex flex-col gap-2 lg:w-1/2 sm:w-full justify-center">
                        <label class="font-semibold" for="Fname">Full Name</label>
                        <input class="w-full px-2 py-1 bg-slate-100 rounded-sm " type="text" placeholder="Your Full name" name="Fname" required />
                    </div>
                    <div class="flex flex-col gap-2 lg:w-1/2 sm:w-full justify-center">
                        <label class="font-semibold" for="Fname">Username</label>
                        <input class="w-full px-2 py-1 bg-slate-100 rounded-sm " type="text" placeholder="Username" name="Username" required />
                    </div>
                </div>
                <label class="font-semibold" for="Email">Email</label><br>
                <input class="w-full px-2 py-1 bg-slate-100 rounded-sm " type="email" placeholder="Email" name="email" required /><br>
                <label class="font-semibold" for="Password">Password</label><br>
                <input class="w-full px-2 py-1 bg-slate-100 rounded-sm " type="password" placeholder="password" name="password" required /><br>
                <label class="font-semibold" for="pnum">Phone number</label><br>
                <input class="w-full px-2 py-1 bg-slate-100 rounded-sm " type="text" placeholder="Phone number" name="Pnum" required /><br>
                <label class="font-semibold" for="Profeincy" name="proficiency">Proficiency</label><br>
                <input class="w-full px-2 py-1 bg-slate-100 rounded-sm "
                    type="text"
                    placeholder="Proficiency skills"
                    name="Proficiency" required /><br>
                <div class="flex flex-col gap-1 items-center mt-4">
                    <input class="px-10 py-1 bg-orange-600 rounded-full text-white font-semibold cursor-pointer self-center" type="submit" value="Sign up" name="submitUp" />

                    <div class="flex">
                        <p>Already have an account?</p>
                        <a href="./signin.php" class="text-blue-800 font-bold">Sign in</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>