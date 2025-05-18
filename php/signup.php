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