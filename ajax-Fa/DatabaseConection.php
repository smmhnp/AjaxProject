<?php
    $db = "ajax";
    $username = "admin";
    $password = "admin";
    $host = "localhost";
    global $mysqli;

    try {
        $mysqli = new mysqli ($host, $username, $password, $db, 3308);
    } catch (mysqli_sql_exception $e) {
        die('Connection Error: ' . $e->getMessage());
    }

    //$mysqli -> set_charset("utf8");