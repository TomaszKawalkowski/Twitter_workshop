<?php

require_once('src/connection.php');
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = User::logIn($_POST['mail'], $_POST['password']);
    var_dump($user);
    var_dump ($_POST['mail']);
    var_dump ($_POST['password']);
    if ($user != false){
        $_SESSION["user"]= $user;
        header("location: main.php");
    }
    echo("Zly login lub haslo");
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
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
<div class="form-group">
<form action = 'login.php' method='post'>
    <input class="form-control" type="text" name="mail" placeholder="Enter mail">
    <input class="form-control" type="password" name="password" placeholder="Enter password">
    <input class="form-control" type="submit" value="login">
</form>
</div>
    <div class="col-md-4"></div>
</div>
</div>
</body>
</html>