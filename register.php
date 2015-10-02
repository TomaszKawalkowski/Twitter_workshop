<?php
require_once('src/connection.php');
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $newUser = User::register($_POST['email'], $_POST['password'], $_POST['password2'], $_POST['description']);
    if ($newUser != false){
        $_SESSION['user'] = $newUser;
        header('location: main.php');
    }
    echo "Blad rejestracji";
}


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<div style="height:100px; background-color:orange"></div>
<div style="height:30px; "></div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
<form method="post" action="register.php">
    <input type="text" name = "email" placeholder="Enter yor email">
    <input type="password" name = "password" placeholder="Enter yor password">
    <input type="password" name = "password2" placeholder="Enter yor password">
    <input type="text" name = "description" placeholder="Desribe your self">
    <input type ="submit">
    </div>
</div>
    <div class="col-md-4"></div>
</div>
</form>
</body>
