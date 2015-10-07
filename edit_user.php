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
<nav class="navbar navbar-inverse navbar-fixed-top " >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="main.php">Welcome to Dweeter</a>
        </div>
        <div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav" >
                    <li><a href="main.php">Main Page</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="showuser.php">User Page</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>


                </ul>
            </div>
        </div>
    </div>
</nav>
<div style="height:60px"></div>


<div class="container">
    <div style="height:150px; background-color:dimgray; text-align: center; color: beige; padding: 15px;" ><H1> WELCOME TO DWEETER !!!</H1><H3>You can change your description here</H3></div>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <form method="post" action="edit_user.php">

                        <div class="form-group">
                            <textarea class="form-control" rows="5" name = "description" id="comment"placeholder="Write the new stuf about yourself"></textarea>
                        </div>


                        <button type="submit" class="btn btn-info" value="Change your description" style = "width:100%; x">Send changes</button>
                    </form>
                    <div style = "height:20px;"></div>
                    <a href="showuser.php"<button type="submit" class="btn btn-info" value="Go to your main page" style = "width:100%; x">Go to your main page</button></a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
</div>
</div>



