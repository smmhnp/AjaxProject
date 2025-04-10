<?php
    require ("DatabaseConection.php");
    require ("function.php");

    if(isset($_POST['operation'])){                                                                 //operation resive from index.php

        if ($_POST['operation'] == 'Add'){                                                          //opreation = Add -> data add to database
            $image = '';
            if ($_FILES['user_image']['name'] != ''){
                $image = UploadImage();
            } else {
                $Number = rand(1, 4) . ".png";
                $NewNumber = rand() . ".png";
                $upload =  __DIR__ . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . "default" . DIRECTORY_SEPARATOR . $Number;
                $new = __DIR__ . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . $NewNumber;

                copy($upload, $new);

                $image = $NewNumber;
            }

            $FirstName = $_POST['first_name'];
            $LastName = $_POST['last_name'];
            $Email = $_POST['email'];
            $Age = $_POST['age'];

            $result = $mysqli -> query("
                INSERT INTO `users`
                (`firstname`, `lastname`, `email`, `age`, `img`) 
                VALUES ('$FirstName','$LastName','$Email','$Age', '$image')
            ");

            if(!empty($result)){
                echo "اطلاعات کاربر جدید با موفقیت دریافت شد .";
            }
        }

        if($_POST['operation'] == 'Edit'){                                                          //operation = edit -> data edited in database
            $FirstName = $_POST['first_name'];
            $LastName = $_POST['last_name'];
            $Email = $_POST['email'];
            $Age = $_POST['age'];
            $id = $_POST['user_id'];
            
            $lastimage = GetUserImage($_POST['user_id']);                                           //get last image address
            
            $image = '';  
            $returning = false;                                                                     //define image is chenge or NO
            if ($_FILES['user_image']['name'] != ''){                                               //set new image (chenge image)
                $image = UploadImage();                                                             //define image is chenge
                $returning = true;
            } else {                                                                                //if image is not chenge new image equal to last image
                $image = $lastimage;
            }
            
            if ($returning){                                                                        //if image is chenge last image is delete
                if(is_file($lastimage)){
                    unlink("upload/".$lastimage);
                }
            }

            $result = $mysqli -> query("
                UPDATE `users` SET
                `img` = '$image',
                `firstname`='$FirstName',
                `lastname`='$LastName',
                `email`='$Email',
                `age`='$Age'
                WHERE `id` = $id
            ");

            if(!empty($result)){
                echo "اطلاعات کاربر با موفقیت ویرایش شد .";
            }
        }
    }
	