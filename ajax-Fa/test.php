<?php
require ("function.php");

$num = rand(1, 4);
//$upload = DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . $num . ".png";
$upload =  __DIR__ . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . "default" . DIRECTORY_SEPARATOR . $num . ".png";
$new = __DIR__ . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . rand() . ".png";


copy($upload, $new);

echo __DIR__ . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . "default" . DIRECTORY_SEPARATOR . $num . ".png";
echo "<br>";
echo __DIR__ . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . $num . ".png";
