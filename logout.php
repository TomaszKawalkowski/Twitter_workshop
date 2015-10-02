<?php
require_once("src/connection.php");
require_once("src/users.php");
session_start();
unset($_SESSION['user']);
header("location: login.php");
