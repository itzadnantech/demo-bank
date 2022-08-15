<?php
$servername = "localhost";
$username = "guve_bk2";
$password = "Ugo221o01##1";
$dbname = "guve_bk2";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}

?>