<?php
    session_start();
?>
<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="../map.ico" type="image/x-icon">
        <title>Веб-довідник для туристів</title>


        <link rel="stylesheet" href="../css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
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
                        <li><a href="index.php?action=add">Створити місце для подорожі</a></li>
                        <li><a><?php echo $_SESSION['login']?></a></li>
                        <li><a href="../models/exit.php">Вихід</a></li>
                    </ul>
                </div>
            </nav> 
            <!-- END Header (navbar) -->
            <div class="panel panel-default">
                <table id="admin_table" class="table">
                    <tr>
                        <th>Дата</th>
                        <th>Заголовок</th>
                        <th>Категорія</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach($articles as $article): ?>
                        <tr>
                            <td><?=$article['date']?></td>
                            <td><?=articles_intro($article['title'], 80)?></td>
                            <td><?=$article['category']?></td>
                            <td>
                                <a style="color: rgb(0, 0, 0)" href="index.php?action=edit&id=<?=$article['id']?>">Редактировать</a>
                            </td>
                            <td>
                                <a style="color: rgb(0, 0, 0)" href="index.php?action=delete&id=<?=$article['id']?>">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <footer>
                <p>
                    Веб-довідник для туристів<br>Copyright &copy; 2017
                </p>
            </footer>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.js"></script>
    </body>
</hmtl>

