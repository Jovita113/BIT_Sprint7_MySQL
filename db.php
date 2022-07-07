<?php

session_start();

$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "sprintdb";

// Create connection
$conn = mysqli_connect($hostName, $userName, $password, $databaseName);
// Check connection
if (!$conn) {
  die("Connection failed: ");
}
?>