<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeux_video";

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "<font color='green'>Connected successfully</font>";
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}

 ?>
