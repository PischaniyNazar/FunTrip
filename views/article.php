<?php
    session_start();
?>
<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="../map.ico" type="image/x-icon">
        <title>The tourists app</title>
        <link rel="stylesheet" href="../css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <script type="text/javascript">
                var myMap;
                // Дождёмся загрузки API и готовности DOM.
                ymaps.ready(init);

                function init () {
                    // Создание экземпляра карты и его привязка к контейнеру с
                    // заданным id ("map").
                    myMap = new ymaps.Map('map', {
                        // При инициализации карты обязательно нужно указать
                        // её центр и коэффициент масштабирования.
                        center: [49.25, 31.20],
                        zoom: 6
                    }, {
                        searchControlProvider: 'yandex#search'
                    });
            
                    myMap.geoObjects
                        .add (new ymaps.Placemark([<?php echo $article['coords']; ?>]));
                }
            </script>
    </head>
    <body>
        <!-- Page div -->
        <div class="container">
            <!-- Header -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a style="padding:5px 10px 5px 10px" class="navbar-brand" href="index.php">
                            <img style="width:40px; height:100%" alt="Brand" src="../map_by_artdesigner.png">
                        </a>
                        <a  class="navbar-brand" href="index.php">The tourists app</a>
                    </div>
                    
                        <?php
                        if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
                        ?>
                            <ul class="nav nav-pills navbar-right">
                            <li><a href="views/log.php">Вхід</a></li>
                            <li><a href="views/reg.php">Реєстрація</a></li>
                        <?php 
                        }
                        else {
                        ?>
                            <ul class="nav nav-pills navbar-right">
                            <li><a href="../admin">Редактор місць</a></li>
                            <li><a><?php echo $_SESSION['login']?></a></li>
                            <li><a href="../models/exit.php">Вихід</a></li>
                        <?php
                        }
                        ?>

              
                </div>
            </nav> 
            <!-- END Header -->
            <!-- Content -->
            <div class="article">
                
                <h3><?=$article['title']?></h3>
                <b>Категорія:</b> <?=$article['category']?><br>
                <em>Добавлено: <?=$article['date']?></em>
                <p class="enter panel panel-default"><?=$article['content']?></p>
                <img class="img-responsive img-thumbnail" src="<?=$article['image']?>" alt="Зображення">
            </div>
            <div id="map" style="width:100%; height:450px"></div>
            <!-- END Content -->
            <!-- Footer -->
            <footer>
                <p>
                    The tourists app<br>Copyright &copy; 2016
                </p>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page div -->
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.js"></script>
    </body>
</hmtl>