<html>
    <head>
        <title>Веб-довідник для туристів</title>
        <link rel="stylesheet" href="../css/style.css">
        <link href="../css/bootstrap.css" rel="stylesheet">
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
                </div>
            </nav> 
            <!-- END Header (navbar) -->
            <h2 class="reg">Реєстрація</h2><br>
            <form action="../models/save_user.php" method="post">
            <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
        <div class="form-group col-xs-10">

            <label class="control-label col-xs-2"><h4>Ваш логін:</h4></label>
            <div class="col-xs-8">
            <input class="form-control" name="login" type="text" size="15" maxlength="15">
        </div>
            
        </div>
        <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
        <div class="form-group col-xs-10">

            <label class="control-label col-xs-2"><h4>Ваш пароль:</h4></label>
            <div class="col-xs-8">
            <input class="form-control" name="password" type="password" size="15" maxlength="15">
            </div>
            
            </div>
        <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 
            <div class="form-group col-xs-10">
                <div class=" col-xs-8">

                <input style="width:155px;" class="btn btn-primary" type="submit" name="submit" value="Зареєструватися">
            <!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** --> 
                </div>
            </div>
        </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../js/bootstrap.js"></script>
    </body>
    </html>