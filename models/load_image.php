<?php
$extensions = array('jpeg', 'jpg', 'png', 'gif', 'JPEG', 'JPG', 'PNG', 'GIF', '');
            $ext = strtolower(pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION));
                    if (in_array($ext, $extensions)){
                
                        $uploaddir = '../images/';
                        // это папка, в которую будет загружаться картинка
                        $apend=date('YmdHis').rand(100,1000).'.jpg'; 
                        // это имя, которое будет присвоенно изображению 
                        $uploadfile = "$uploaddir$apend"; 
                        //в переменную $uploadfile будет входить папка и имя изображения
                         
                        // В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
                        // И проходит ли изображение по весу. В нашем случае до 512 Кб
                        
                        if($_FILES['userfile']['size']<=3005000) 
                        { 
                    
        // проверяем есть ли расширение в массиве допустимых
                // Указываем максимальный вес загружаемого файла. Сейчас до 1,5 МБ 
                            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
                            { 
                                //Здесь идет процесс загрузки изображения 
                                $size = getimagesize($uploadfile); 
                   // с помощью этой функции мы можем получить размер пикселей изображения 
                                if ($size[0] < 4161 && $size[1]<2449) 
                                { 
                     // если размер изображения не более 1920 пикселей по ширине и не более 1500 по  высоте 
                     
                                } else {
                                 exit("Зображення перевищує допустимі норми (ширина не більше - 4160, висота не більше 2448 пікселів)") ; 
                                } 
                            } else {
                            $uploadfile =null;
                            } 
                        } else { 
                        exit ("Розмір зображення не має перевищувати 3 Мб");
                        }
                    } else {
                        exit ("Формат зображення має бути: ipg, jpeg, png або gif");
                    } ?>