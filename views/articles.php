<?php
    session_start();
?>
<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>Блог</title>
        <link rel="stylesheet" href="../css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="blog" class="navbar-brand" href="index.php">Блог</a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
                        ?>
                            <ul class="nav navbar-nav navbar-right">
                            <li><a href="admin">Панель администратора</a></li>
                            <li><a href="views/log.php">Вхід</a></li>
                            <li><a href="views/reg.php">Реєстрація</a></li>
                        <?php 
                        }
                        else {
                        ?>
                            <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><?php echo $_SESSION['login']?></a></li>
                            <li><a href="../models/exit.php">Вихід</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </nav> 
            <!-- END Header (navbar) -->
            <div class="container content">
                
                    <div class="col-md-3">
                        <ul class="nav nav-list list-group">
                            <li class="nav-header">Розваги</li>
                                <li><a href="views/tur_category.php?category=Кінотеатри" class="list-group-item">Кінотеатри</a></li>
                                <li><a href="views/tur_category.php?category=Цирки/Атракціони" class="list-group-item">Цирки/Атракціони</a></li>
                                <li><a href="views/tur_category.php?category=Зоопарки" class="list-group-item">Зоопарки</a></li>
                                <li><a href="views/tur_category.php?category=Бари/Нічні клуби" class="list-group-item">Бари/Нічні клуби</a></li>
                            <li class="nav-header">Відпочинок/Релігія</li>
                                <li><a href="views/tur_category.php?category=Зони відпочинку" class="list-group-item">Зони відпочинку</a></li>
                                <li><a href="views/tur_category.php?category=Музеї/Галереї" class="list-group-item">Музеї/Галереї</a></li>
                                <li><a href="views/tur_category.php?category=Церкви/Храми" class="list-group-item">Церкви/Храми</a></li>
                                <li><a href="views/tur_category.php?category=Пам`ятки" class="list-group-item">Пам`ятки</a></li>
                                <li><a href="views/tur_category.php?category=Кемпінги" class="list-group-item">Кемпінги</a></li>
                                <li><a href="views/tur_category.php?category=Парки/Сади" class="list-group-item">Парки/Сади</a></li>
                            <li class="nav-header">Спорт</li>
                                <li><a href="views/tur_category.php?category=Стадіони" class="list-group-item">Стадіони</a></li>
                                <li><a href="views/tur_category.php?category=Спорт, фітнес" class="list-group-item">Спорт, фітнес</a></li>
                                <li><a href="views/tur_category.php?category=Ковзанки" class="list-group-item">Ковзанки</a></li>
                                <li><a href="views/tur_category.php?category=Басейни" class="list-group-item">Басейни</a></li>
                                <li><a href="views/tur_category.php?category=Боулінг" class="list-group-item">Боулінг</a></li>
                                <li><a href="views/tur_category.php?category=Лижні центри" class="list-group-item">Лижні центри</a></li>
                                <li><a href="views/tur_category.php?category=Гольф-клуби" class="list-group-item">Гольф-клуби</a></li>
                            <li class="nav-header">Продукти</li>
                                <li><a href="views/tur_category.php?category=Ресторани/Фастфуди" class="list-group-item">Ресторани/Фастфуди</a></li>
                                <li><a href="views/tur_category.php?category=Кафе" class="list-group-item">Кафе</a></li>
                                <li><a href="views/tur_category.php?category=Піцерії" class="list-group-item">Піцерії</a></li>
                                <li><a href="views/tur_category.php?category=Бари" class="list-group-item">Бари</a></li>
                            <li class="nav-header">Інше</li>
                                <li><a href="views/tur_category.php?category=Інше" class="list-group-item">Інше</a></li>
                        </ul>
                        
                    </div>

                    <div class="col-md-9">
                        <?php foreach($articles as $article): ?>
                        <div class="article col-md-9">
                            <h3><a href="article.php?id=<?=$article['id']?>"><?=$article['title']?></a></h3>
                            <b>Категория:</b> <?=$article['category']?><br>
                            <em>Опубликованно: <?=$article['date']?></em>
                            <p><?=articles_intro($article['content'])?></p>
                        </div>
                        <div class="article col-md-2">
                            <img class=" article img-responsive img-thumbnail" src="<?=$article['image']?>" alt="Зображення">
                        </div>
                        <?php endforeach ?>
                    </div>
            </div>
            
            <footer>
                <p>
                    Блог<br>Copyright &copy; 2016
                </p>
            </footer>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.js"></script>
    </body>
</hmtl>