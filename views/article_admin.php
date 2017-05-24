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
         <script src="../js/index.js" type="text/javascript"></script>
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
                        <input type="text" name="title" value="<?=$article['title']?>" class="form-item" autofocus required>
                    </label>

       
                        <select id="basic" class="selectpicker show-tick form-control" data-live-search="true" 
                        name="category" value="<?=$article['category']?>">
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
                        <input type="date" name="date" value="<?=$article['date']?>" class="form-item" required>
                    </label>
                    <label>
                        Опис
                        <textarea class="form-item" name="content" required><?=$article['content']?></textarea>
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