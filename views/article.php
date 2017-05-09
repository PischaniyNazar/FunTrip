<?php
    session_start();
?>
<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>Блог</title>
        <link rel="stylesheet" href="style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
        <!-- Page div -->
        <div class="container">
            <!-- Header -->
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
            <!-- END Header -->
            <!-- Content -->
            <div class="article">
                <h3><?=$article['title']?></h3>
                <em>Опубликованно: <?=$article['date']?></em>
                <p><?=$article['content']?></p>
            </div>
            <!-- END Content -->
            <!-- Footer -->
            <footer>
                <p>
                    Блог<br>Copyright &copy; 2016
                </p>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page div -->
    </body>
</hmtl>