<?php
require_once("src/connection.php");


session_start();

if(isset($_SESSION['user']) == false){
    header("loacation: login.php");
}
$myUser = $_SESSION['user'];

$allUsers = User::getAllUsers();
foreach($allUsers as $user){
    echo ("{$user->getEmail()}");
    echo ("<a href='showuser.php?userId={$user->getId()}'");
    echo("<br>");
}

?>