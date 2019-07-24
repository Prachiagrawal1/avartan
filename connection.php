<?php
session_start();
$servername = "localhost";
$username = "mybtclnq_harsh";
$password = "h@undigit$123";
$dbname = "mybtclnq_rssfeed";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
    die("Connection Failed: ".mysqli_connect_error());
} else {
    echo "Connected successfully!!";
}

$sql = "CREATE TABLE admin(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
    )";

if(mysqli_query($conn, $sql)) {
    echo "Table created";
}

mysqli_close($conn);
?> 