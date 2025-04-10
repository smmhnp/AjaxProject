<?php
    require ("DatabaseConection.php");
    require ("function.php");

    if(isset($_POST['user_id'])){
        
        global $mysqli;
        $output = array();
        $id = $_POST['user_id'];

        $result = $mysqli -> query("
            SELECT * FROM `users`
            WHERE `id` = '$id'
            LIMIT 1
        ");

        while($row = $result -> fetch_assoc()){
            $output['FirstName'] = $row['firstname'];
            $output['LastName'] = $row['lastname'];
            $output['Email'] = $row['email'];
            $output['Age'] = $row['age'];
            
            if($row['img'] != ''){
                $output['user_image'] = '<img src="upload/' . $row['img'] . '" class="img-thumbnail" width="50" height="35"><input type="hidden" name="hidden_user_image" value="' . $row['img'] . '">';
            } else {
                $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="">';
            }
        }

        echo json_encode($output);
    }

    