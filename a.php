<?php
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
?>