<?php
    session_start();
    $i=0;
    foreach($articles as $article):
        $arr[$i] = $article['coords'];
        $i++;
    endforeach;
?>
<!DOCTYPE html>
<hmtl>
    <head>
        <link rel="shortcut icon" href="../map.ico" type="image/x-icon">
        <meta charset="utf-8">
        <title>Веб-довідник для туристів</title>
        
<!--         <link rel="shortcut icon" href="../map.png" type="image/png"> -->
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
                    <?php for ($k = 0; $k <$i; $k++) {  ?>
                        myMap.geoObjects
                            .add (new ymaps.Placemark([<?php echo $arr[$k]; ?>]));
                    <?php };?>
                    
                    var myClusterer = new ymaps.Clusterer();
                    myClusterer.add(myGeoObjects);
                    myMap.geoObjects.add(myClusterer);

                }
            </script>
        
    </head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default ">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a style="padding:5px 10px 5px 10px" class="navbar-brand" href="index.php">
                            <img style="width:40px; height:100%" alt="Brand" src="../map_by_artdesigner.png">
                        </a>
                        <a  class="navbar-brand" href="index.php">Веб-довідник для туристів</a>

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
                            <li><a href="admin">Редактор місць</a></li>
                            <li><a><?php echo $_SESSION['login']?></a></li>
                            <li><a href="../models/exit.php">Вихід</a></li>
                        <?php
                        }
                        ?>
               
                </div>
            </nav> 
            <!-- END Header (navbar) -->

                
                    <div class="col-md-3">
                        <ul class="nav nav-list list-group" >
                            <li class="nav-header"><h4>Розваги</h4></li>
                                <li><a href="views/tur_category.php?category=Кінотеатри" class="list-group-item">Кінотеатри</a></li>
                                <li><a href="views/tur_category.php?category=Цирки/Атракціони" class="list-group-item">Цирки/Атракціони</a></li>
                                <li><a href="views/tur_category.php?category=Зоопарки" class="list-group-item">Зоопарки</a></li>
                                <li><a href="views/tur_category.php?category=Бари/Нічні клуби" class="list-group-item">Бари/Нічні клуби</a></li>
                            <li class="nav-header"><h4>Відпочинок/Релігія</h4></li>
                                <li><a href="views/tur_category.php?category=Зони відпочинку" class="list-group-item">Зони відпочинку</a></li>
                                <li><a href="views/tur_category.php?category=Музеї/Галереї" class="list-group-item">Музеї/Галереї</a></li>
                                <li><a href="views/tur_category.php?category=Церкви/Храми" class="list-group-item">Церкви/Храми</a></li>
                                <li><a href="views/tur_category.php?category=Пам`ятки" class="list-group-item">Пам`ятки</a></li>
                                <li><a href="views/tur_category.php?category=Кемпінги" class="list-group-item">Кемпінги</a></li>
                                <li><a href="views/tur_category.php?category=Парки/Сади" class="list-group-item">Парки/Сади</a></li>
                            <li class="nav-header"><h4>Спорт</h4></li>
                                <li><a href="views/tur_category.php?category=Стадіони" class="list-group-item">Стадіони</a></li>
                                <li><a href="views/tur_category.php?category=Спорт, фітнес" class="list-group-item">Спорт, фітнес</a></li>
                                <li><a href="views/tur_category.php?category=Ковзанки" class="list-group-item">Ковзанки</a></li>
                                <li><a href="views/tur_category.php?category=Басейни" class="list-group-item">Басейни</a></li>
                                <li><a href="views/tur_category.php?category=Боулінг" class="list-group-item">Боулінг</a></li>
                                <li><a href="views/tur_category.php?category=Лижні центри" class="list-group-item">Лижні центри</a></li>
                                <li><a href="views/tur_category.php?category=Гольф-клуби" class="list-group-item">Гольф-клуби</a></li>
                            <li class="nav-header"><h4>Продукти</h4></li>
                                <li><a href="views/tur_category.php?category=Ресторани/Фастфуди" class="list-group-item">Ресторани/Фастфуди</a></li>
                                <li><a href="views/tur_category.php?category=Кафе" class="list-group-item">Кафе</a></li>
                                <li><a href="views/tur_category.php?category=Піцерії" class="list-group-item">Піцерії</a></li>
                                <li><a href="views/tur_category.php?category=Бари" class="list-group-item">Бари</a></li>
                            <li class="nav-header"><h4>Інше</h4></li>
                                <li><a href="views/tur_category.php?category=Інше" class="list-group-item">Інше</a></li>
                        </ul>
                        
                    </div>

            <div class="col-md-9">
            
<p>Карта України</p>
    <div id="map" style="width:100%; height:450px"></div>

            </div>
            <div class="container content">
                    <div class="col-md-9">
                        <?php foreach($articles as $article): ?>
                        <div class="article col-md-9 panel panel-default">
                            <h3><a href="article.php?id=<?=$article['id']?>"><?=$article['title']?></a></h3>
                            <b>Категория:</b> <?=$article['category']?><br>
                            <em>Добавлено: <?=$article['date']?></em>
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
                    Веб-довідник для туристів<br>Copyright &copy; 2017
                </p>
            </footer>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.js"></script>
    </body>
</hmtl>