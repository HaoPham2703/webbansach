<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bansachonline";
$conn = new mysqli($servername,$username,$password,$dbname);
// Check connection
if ($conn->connect_error)
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $conn->set_charset("utf8")
?>