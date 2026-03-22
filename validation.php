<?php
session_start();
require_once __DIR__ . '/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$s = "select * from users where username = '$username' && password = '$password'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['username'] = $username;
    header ('location: index.php');
}
else{
    header ('location: login.php');
}

?>