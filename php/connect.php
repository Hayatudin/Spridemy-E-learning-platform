<?php
session_start();

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'springify';
$conn = mysqli_connect($hostname, $username, $password, $dbname); // change port if needed


if (!$conn) {
    echo 'connection failed!';
}
