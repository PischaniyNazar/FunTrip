<?php
    require_once("database.php");
    require_once("models/tours.php");
    
    $link = db_connect();
    $tour = tour_get($link, $_GET['id']);
    include("views/tour.php");
?>