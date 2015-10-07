<?php
require_once("src/connection.php");


session_start();

if(isset($_SESSION['user']) == false){
    header("loacation: login.php");
}


$y = USER::getAllUsers();

echo '<pre>';
var_dump($y);

echo '</pre>';
foreach ($y as $user){
    echo "{$user->getid()} <br> {$user->getEmail()}<br>";

}

?>