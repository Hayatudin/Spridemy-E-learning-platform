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
