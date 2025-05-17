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

