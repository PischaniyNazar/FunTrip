<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>Блог</title>
         <link rel="stylesheet" href="../css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/bootstrap-select.css">
    </head>
    <body>
        <div class="container">
            <!-- Header (navbar) -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a id="blog" class="navbar-brand" href="../index.php">Блог</a>
                    </div>
                </div>
            </nav> 
            <!-- END Header (navbar) -->
            <div id="addart">
                <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                    <label>
                        Название
                        <input type="text" name="title" value="<?=$article['title']?>" class="form-item" autofocus required>
                    </label>

       
                        <select id="basic" class="selectpicker show-tick form-control" data-live-search="true" 
                        name="category" value="<?=$article['category']?>">
                            <optgroup label="Розваги">
                                <option >Кінотеатри</option>
                                <option >Цирки/Атракціони</option>
                                <option>Зоопарки</option>
                                <option >Бари/Нічні клуби</option>
                            </optgroup>    
                            <optgroup label="Відпочинок/Релігія">
                                <option>Зони відпочинку</option>
                                <option>Музеї/Галереї</option>
                                <option>Церкви/Храми</option>
                                <option>Пам'ятки</option>
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
                        Содержимое
                        <textarea class="form-item" name="content" required><?=$article['content']?></textarea>
                    </label>
                    <input type="submit" value="Сохранить" class="btn">
                </form>
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
        
        <script src="../js/bootstrap-select.js"></script>
    </body>
</hmtl>