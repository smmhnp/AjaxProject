<?php

    require ("DatabaseConection.php");
    define ('SITE_URL', realpath(dirname(__FILE__)));

    function UploadImage (){
        if (isset($_FILES['user_image'])){
            $extension = explode('.', $_FILES['user_image']['name']);
            $NewName = rand() . '.' . $extension[1];
            if (!file_exists('upload')){
                mkdir('upload', 0777, true);
            }  
            $upload = DIRECTORY_SEPARATOR .'upload' . DIRECTORY_SEPARATOR . $NewName;
            @move_uploaded_file($_FILES['user_image']['tmp_name'], SITE_URL . $upload);
            return $NewName;
        }
    }

    function GetTotalAllRecord (){
        global $mysqli;

        $result = $mysqli->query("
            SELECT COUNT(*) as total FROM users
        ");
        $row = $result->fetch_assoc();
        
        return $row['total'];
    }

    function GetUserImage ($id){
        global $mysqli;
        $result = $mysqli -> query("
            SELECT `img` FROM `users`
            WHERE `id` = '$id'
        ");

        while($row = $result -> fetch_assoc()){
            return $row["img"];
        }    
    }