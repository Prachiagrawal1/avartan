<?php 

session_start();
if(isset($_SESSION['username']) && $_SESSION['username']!==null){
    header('Location:dashboard.php');
} else {
header('Location: login.php');
} 

