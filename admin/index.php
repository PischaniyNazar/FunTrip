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
           
            
                
                $uploaddir = '../images/';
                // это папка, в которую будет загружаться картинка
                $apend=date('YmdHis').rand(100,1000).'.jpg'; 
                // это имя, которое будет присвоенно изображению 
                $uploadfile = "$uploaddir$apend"; 
                //в переменную $uploadfile будет входить папка и имя изображения
                 
                // В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
                // И проходит ли изображение по весу. В нашем случае до 512 Кб
                if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=1535000)) 
                { 
                // Указываем максимальный вес загружаемого файла. Сейчас до 1,5 МБ 
                  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
                   { 
                   //Здесь идет процесс загрузки изображения 
                   $size = getimagesize($uploadfile); 
                   // с помощью этой функции мы можем получить размер пикселей изображения 
                     if ($size[0] < 1921 && $size[1]<1501) 
                     { 
                     // если размер изображения не более 1920 пикселей по ширине и не более 1500 по  высоте 
                     
                     } else {
                     echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 1920; высота не более 1500)"; 
                     unlink($uploadfile); 
                     // удаление файла 
                     } 
                   } else {
                   echo "Файл не загружен, вернитеcь и попробуйте еще раз";
                   } 
                } else { 
                echo "Размер файла не должен превышать 1,5 Мб";
                } 
                articles_new($link, $_POST['title'], $_POST['category'], $_POST['date'], $_POST['content'], $uploadfile);

            header("Location: index.php");
        }

        include("../views/article_admin.php");
    }else if($action == 'edit'){
        if(!isset($_GET['id']))
            header('Location: index.php');
        $id = (int)$_GET['id'];
        include("../models/image.php");
        if(!empty($_POST) && $id > 0) {
            articles_edit($link, $id, $_POST['title'], $_POST['category'], $_POST['date'], $_POST['content'], $_POST['image']);
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