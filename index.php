<?php 

// We do this everywhere whereever we want to use session variables
session_start();

// For now lets redirect it to login page no matter what
header('Location: login.php');

// No we need to create a table for the users

/*
if(!isset($_POST['login'])) {
    header('Location: login.php');
}else {
    header('Location: function.php');
}

*/
// dekh abhi koi table nhi hai to apan vo banaenge
/*
tables ban gaye ab ab kam krna hai user se input lekar backend me lana hai


*/