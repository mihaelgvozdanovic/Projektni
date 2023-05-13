<?php
// Start the session
session_start();

$_ENV = parse_ini_file("baza.env");

$db_hostname = $_ENV['HOSTNAME'];
$db_username = $_ENV['USERNAME'];
$db_pass = $_ENV['PASS'];
$db_name = $_ENV['NAME'];

// Connect to Mysql
$db_connection = mysqli_connect($db_hostname,$db_username,$db_pass,$db_name);

// Check connection to Mysql
if (mysqli_connect_errno()) {
    $_SESSION['error'] = "Failed to connect to the MySQL server: " . mysqli_connect_error();
    header("Location: ../index.php?error=mysql_connection");
    exit();
}
?>