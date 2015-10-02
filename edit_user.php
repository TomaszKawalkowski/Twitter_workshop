<?php


require_once("src/connection.php");


session_start();

if(isset($_SESSION['user']) == false){
    header("loacation: login.php");
}
$myUser = $_SESSION['user'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $myUser->setDescription($_POST['description']);
    $myUser->saveToDB();

}
?>

<form method="post" action="edit_user.php">
<input type="text" name = "description" placeholder="napisz coś o sobie">
<input type ="submit">


</form>
