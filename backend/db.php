<?php
$servername = "localhost";
$username = "root";
$password = "";
$port = 3307; 
$dbname = "LoanManagement";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
