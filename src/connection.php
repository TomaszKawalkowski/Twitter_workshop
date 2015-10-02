<?php
/**
 * Created by PhpStorm.
 * User: Dorota
 * Date: 2015-10-02
 * Time: 11:13
 */
include_once('users.php');
$userName = "root";
$pass = "coderslab";
$host = "localhost";
$dbName = "Tweeter";

$conn = new mysqli($host, $userName, $pass, $dbName);

if($conn ==false){
    die("Cannt connect");

}


User::setConnection($conn);


//$createdUser = User::register('romek', 'dudek', 'dudek', 'kalosz');


/*
$loginUser = User::logIn("tomasz@kawalowski2.pl", "dudek");
var_dump($loginUser);
$loginUser->setDescription("po poludniu kawka");
$loginUser->savetoDB();
var_dump($loginUser);
*/



