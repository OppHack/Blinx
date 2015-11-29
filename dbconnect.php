<?php
$server = "localhost:3306";
$username = "root";
$password = "root";

$conn = new mysqli($server, $username, $password, 'blinx');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
