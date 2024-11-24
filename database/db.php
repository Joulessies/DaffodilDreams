<?php

define('DB_HOST', 'localhost'); 
define('DB_USER', 'root'); 
define('DB_PASS', ''); 
define('DB_NAME', 'daffodil'); 

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
} else if ($conn->connect_errno) {
} else {
    $sql = "SELECT * FROM `daffodil`.`users`";
}

if ($conn->query($sql)) {
} else {
    echo "Error". $conn->error;
} 


$result = $conn->query($sql);
$conn->set_charset("utf8");

?>