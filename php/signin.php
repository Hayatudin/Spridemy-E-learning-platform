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