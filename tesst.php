<?php
// Your code here!

$name=$_GET['name'];
$pass=$_GET['pass'];
$roll=$_GET['roll'];


$arr = array();
$arr['name'] = $name;
$arr['$pass'] = $pass;
$arr['roll'] = $roll;



echo json_encode($arr);

?>
