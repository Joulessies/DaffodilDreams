<?php

$host = "localhost";
$user = "root";
$password = ""; 
$database = "daffodil"; 

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>