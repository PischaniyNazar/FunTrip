<?php 
    session_start();

    require_once("../database.php");
    require_once("../models/tours.php");

        
    $link = db_connect();
    
    $tour['title']='';
    $tour['category']='';
    $tour['date']='';
    $tour['content']='';
    $tour['image']='';

    if(isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action = "";
    
    if($action == "add"){

                       


        if(!empty($_POST)){
             if (isset($_GET['u_name']))
                        {
                            echo "Значение JavaScript-переменной: ". $_GET['u_name'];
                        }

                        else
                        {
                            
                            exit();
                        }
            
            include("../models/load_image.php");
            
            tours_new($link, $_SESSION['login'], $_POST['title'], $_POST['category'], $_POST['date'], $_POST['content'], $uploadfile);

            header("Location: index.php");
        }
        include("../views/tour_admin.php");

    }else if($action == 'edit'){
        if(!isset($_GET['id']))
            header('Location: index.php');
        $id = (int)$_GET['id'];
        
        if(!empty($_POST) && $id > 0) {
            include("../models/load_image.php");
            tours_edit($link, $id, $_POST['title'], $_POST['category'], $_POST['date'], $_POST['content'], $uploadfile);
            header("Location: index.php");
        }
        
        $tour = tour_get($link, $id);
        include("../views/tour_admin.php");  
    }else if($action == 'delete'){
        $id = $_GET['id'];
        $tour = tours_delete($link, $id);
        header('Location: index.php');
    }
    else{
        $tours = tours_all($link);
        include("../views/tours_admin.php");        
    }
         

?>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>