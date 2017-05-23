<?php 
    require_once("../database.php");
    
    require_once("../models/articles.php");

        
    $link = db_connect();
    
    $article['title']='';
    $article['category']='';
    $article['date']='';
    $article['content']='';
    $article['image']='';

    if(isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action = "";
    
    if($action == "add"){

        if(!empty($_POST)){
            
            include("../models/load_image.php");
            
            articles_new($link, $_POST['title'], $_POST['category'], $_POST['date'], $_POST['content'], $uploadfile);

            header("Location: index.php");
        }
        include("../views/article_admin.php");
    }else if($action == 'edit'){
        if(!isset($_GET['id']))
            header('Location: index.php');
        $id = (int)$_GET['id'];
        
        if(!empty($_POST) && $id > 0) {
            include("../models/load_image.php");
            articles_edit($link, $id, $_POST['title'], $_POST['category'], $_POST['date'], $_POST['content'], $uploadfile);
            header("Location: index.php");
        }
        
        $article = article_get($link, $id);
        include("../views/article_admin.php");  
    }else if($action == 'delete'){
        $id = $_GET['id'];
        $article = articles_delete($link, $id);
        header('Location: index.php');
    }
    else{
        $articles = articles_all($link);
        include("../views/articles_admin.php");        
    }
         

?>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>