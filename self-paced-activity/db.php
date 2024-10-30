<?php
$servername = "192.168.100.24";
$username = "root";
$password = "";
$dbname = "usersdatabase";

//Create Connection

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
