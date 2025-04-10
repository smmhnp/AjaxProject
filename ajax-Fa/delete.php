<?php
    require ("DatabaseConection.php");
    require ("function.php");

    if (isset($_POST['user_id'])){
        $image = GetUserImage($_POST['user_id']);
        if (is_file($image)){
            unlink("upload/".$image);
        }

        global $mysqli;
        $id = $_POST['user_id'];

        $result = $mysqli -> query("
            DELETE FROM `users`
            WHERE `id` = '$id'
        ");

        if (!empty($result)){
            echo "اطلاعات کاربر با موفقیت حذف شد .";
        }
    }