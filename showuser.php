<?php
require_once("src/connection.php");


session_start();

if(isset($_SESSION['user']) == false){
    header("loacation: login.php");
}
$myUser = $_SESSION['user'];
var_dump($myUser);

//przekazywaninie ID uztkowanika metoda get

if($_SERVER['REQUEST_METHOD'] == "GET"){
    if(isset($_GET["userID"])){
        $userIdToShow = $_get['userId'];
        $userToShow = User::getUserById($userIdToShow);

    }
    else{
        $userToShow = $myUser;
    }
    $userIdToShow = $_GET['userId'];
    $userToShow = User::getUserById($userIdToShow);
    if($userToShow != false){
        echo ("strona user: {$userToShow->getEmail()}");
    }
    else{
        echo'nie ma takiego usera';
    }
}
