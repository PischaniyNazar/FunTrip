<?php
    session_start();
?>
<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>Веб-довідник для туристів</title>
         <link rel="stylesheet" href="../css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap-select.css">
         <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    
         <script type="text/javascript">


         ymaps.ready(init);

                    function init() {
                        var myPlacemark,
                            myMap = new ymaps.Map('map', {
                                center: [49.25, 31.20],
                                zoom: 6
                            }, {
                                searchControlProvider: 'yandex#search'
                            });

                        // Слушаем клик на карте.
                        myMap.events.add('click', function (e) {
                            var coords = e.get('coords');  
                            var d = "g";
                            // alert (coords);
                            $.ajax({
                                url: 'insert.php',
                                type: 'POST',
                                data: d,
                                success: function(data){
                                    alert(data);
                                }
                            });


                            // Если метка уже создана – просто передвигаем ее.
                            if (myPlacemark) {
                                myPlacemark.geometry.setCoordinates(coords);
                            }
                            // Если нет – создаем.
                            else {
                                myPlacemark = createPlacemark(coords);
                                myMap.geoObjects.add(myPlacemark);
                                // Слушаем событие окончания перетаскивания на метке.
                                myPlacemark.events.add('dragend', function () {
                                    getAddress(myPlacemark.geometry.getCoordinates());
                                });
                            }
                            getAddress(coords);
                        });

                        // Создание метки.
                        function createPlacemark(coords) {
                            return new ymaps.Placemark(coords, {}, {
                                preset: 'islands#violetDotIconWithCaption',
                                draggable: true
                            });
                        }

                                                   
                    }
         </script>
    </head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a style="padding:5px 10px 5px 10px" class="navbar-brand" href="../index.php">
                            <img style="width:40px; height:100%" alt="Brand" src="../map_by_artdesigner.png">
                        </a>
                        <a  class="navbar-brand" href="../index.php">Веб-довідник для туристів</a>
                    </div>
                <ul class="nav nav-pills navbar-right">
                        <li><a><?php echo $_SESSION['login']?></a></li>
                        <li><a href="../models/exit.php">Вихід</a></li>
                    </ul>    
                </div>
            </nav> 
            <!-- END Header (navbar) -->
            




            <div id="addart">
                <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" ENCTYPE="multipart/form-data">
                    <label>
                        Заголовок
                        <input type="text" name="title" value="<?=$tour['title']?>" class="form-item" autofocus required>
                    </label>

       
                        <select id="basic" class="selectpicker show-tick form-control" data-live-search="true" 
                        name="category" value="<?=$tour['category']?>">
                            <optgroup label="Розваги">
                                <option>Кінотеатри</option>
                                <option>Цирки/Атракціони</option>
                                <option>Зоопарки</option>
                                <option >Бари/Нічні клуби</option>
                            </optgroup>    
                            <optgroup label="Відпочинок/Релігія">
                                <option>Зони відпочинку</option>
                                <option>Музеї/Галереї</option>
                                <option>Церкви/Храми</option>
                                <option>Пам`ятки</option>
                                <option>Кемпінги</option>
                                <option>Парки/Сади</option>
                            </optgroup>
                            <optgroup label="Спорт">
                                <option>Стадіони</option>
                                <option>Спорт, фітнес</option>
                                <option>Ковзанки</option>
                                <option>Басейни</option>
                                <option>Боулінг</option>
                                <option>Лижні центри</option>
                                <option>Гольф-клуби</option>
                            </optgroup>
                            <optgroup label="Продукти">
                                <option>Ресторани/Фастфуди</option>
                                <option>Кафе</option>
                                <option>Піцерії</option>
                                <option>Бари</option>
                            </optgroup>
                            <optgroup label="Інше">
                                <option>Інше</option>
                            </optgroup>
                        </select>

                    <label>
                        Дата
                        <input type="date" name="date" value="<?=$tour['date']?>" class="form-item" required>
                    </label>
                    <label>
                        Опис
                        <textarea class="form-item" name="content" required><?=$tour['content']?></textarea>
                    </label>
                    <p>
                      <label>Виберіть фотографію. Зображення має бути формату jpg, gif або png:<br></label>
                      <input type="file" name="userfile">
                    </p>


                    <div id="map" style="width:100%; height:450px"></div>
                    
                    
                    <input type="submit" value="Зберегти" class="btn">
                </form>
            </div>

            <footer>
                <p>
                    Веб-довідник для туристів<br>Copyright &copy; 2017
                </p>
            </footer>
        </div>
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>--!>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.js"></script>
        
        <script src="../js/bootstrap-select.js"></script>
    </body>
</hmtl>