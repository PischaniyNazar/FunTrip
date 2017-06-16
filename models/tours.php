<?php
    function tours_all($link){
    // Формируем запрос
        $query = "SELECT * FROM tours ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        
        if(!$result)
            die(mysqli_error($link));
        
    // Извлекаем данные
        $n = mysqli_num_rows($result);
        $tours = array();
        
        for ($i = 0; $i < $n; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            $tours[] = $row;
        }
        
        return $tours;
    }

    function view_category($link, $category){
    // Формируем запрос
        $query = "SELECT * FROM tours WHERE category='".$category."' ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        
        if(!$result)
            die(mysqli_error($link));
        
        $n = mysqli_num_rows($result);
        $category = array();
        for ($i = 0; $i < $n; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            $category[] = $row;
        }
        
        return $category;  
    }

    function tour_get($link, $id_tour){
        $query = sprintf("SELECT * FROM tours WHERE id=%d", (int)$id_tour);
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $tour = mysqli_fetch_assoc($result);
        
        return $tour;
    }

    function tours_new($link, $userLogin, $title, $category, $date, $content, $image){

        // Подготовка
        $title = trim($title);
        $content = trim($content);
            
        // Проверка
        if ($title == '')
            return false;
        if ($image !==null){
            // Запрос
            $template_add = "INSERT INTO tours (userLogin, title, category, date, content, image) VALUES ('%s','%s','%s', '%s', '%s', '%s')";
            
            $query = sprintf($template_add, 
                             mysqli_real_escape_string($link, $userLogin),
                             mysqli_real_escape_string($link, $title),
                             mysqli_real_escape_string($link, $category),
                             mysqli_real_escape_string($link, $date),
                             mysqli_real_escape_string($link, $content),
                             mysqli_real_escape_string($link, $image));
            
            // echo $query;
            $result = mysqli_query($link, $query);
            
            if (!$result)
                die(mysqli_error($link));
            
           
        } else{
            // Запрос
            $template_add = "INSERT INTO tours (userLogin, title, category, date, content) VALUES ('%s','%s','%s', '%s', '%s')";
            
            $query = sprintf($template_add, 
                             mysqli_real_escape_string($link, $userLogin),
                             mysqli_real_escape_string($link, $title),
                             mysqli_real_escape_string($link, $category),
                             mysqli_real_escape_string($link, $date),
                             mysqli_real_escape_string($link, $content));
            
            // echo $query;
            $result = mysqli_query($link, $query);
            
            if (!$result)
                die(mysqli_error($link));
        }
        return true;
    }

    function tours_edit($link, $id, $title, $category, $date, $content, $image){
        // Подготовка
        $title = trim($title);
        $category = trim($category);
        $content = trim($content);
        $date = trim($date);
        $id = (int)$id;

            
        // Проверка
        if ($title == '')
            return false;
        if ($image !==null){
            $image = trim($image);
            // Запрос
            $template_update = "UPDATE tours SET title='%s', category='%s', content='%s', date='%s', image='%s' WHERE id='%d'";
                
            $query = sprintf($template_update, 
                             mysqli_real_escape_string($link, $title),
                             mysqli_real_escape_string($link, $category),
                             mysqli_real_escape_string($link, $content),
                             mysqli_real_escape_string($link, $date),
                             mysqli_real_escape_string($link, $image),
                             $id);
            
            $result = mysqli_query($link, $query);
            
            if (!result)
                die(mysqli_error($link));
        } else {
            // Запрос
            $template_update = "UPDATE tours SET title='%s', category='%s', content='%s', date='%s' WHERE id='%d'";
                
            $query = sprintf($template_update, 
                             mysqli_real_escape_string($link, $title),
                             mysqli_real_escape_string($link, $category),
                             mysqli_real_escape_string($link, $content),
                             mysqli_real_escape_string($link, $date),
                             $id);
            
            $result = mysqli_query($link, $query);
            
            if (!result)
                die(mysqli_error($link));
        }
        
        return mysqli_affected_rows($link);
    }

    function tours_delete($link, $id){
        $id = (int)$id;
        // Проверка
        if ($id == 0)
            return false;
        
        // Запрос
        $query = sprintf("DELETE FROM tours WHERE id='%d'", $id);
        $result = mysqli_query($link, $query);
        
        // if (!result)
        //     die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
    }

    function tours_intro($text, $len = 500)
    {
        return mb_substr($text, 0, $len);        
    }


?>