<?php
$host = 'localhost';  // Change this to your host if needed
$user = 'ur15qszjqz8gm';  // Your database username
$password = '2l0zxlbbz35k';  // Your database password
$dbname = 'dbnfsrbwlclo8o';  // Your database name

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
