<?php
	session_start();
    require_once("database.php");
    require_once("models/tours.php");
    
    $link = db_connect();
    $tours = tours_all($link);
    include("views/tours.php");
?>