<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 28.01.2017
 * Time: 11:58
 */

require_once ('database.php');

function genres_all(){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");
    if (mysqli_connect_errno()){
        printf("Неможливо підключитись до бази даних. Код помилки: %s\n", mysqli_connect_error());
        exit;
    }

    if ($result = $mysqli->query('SELECT * FROM genre;')){
        $genres = array();
        while ($row = $result->fetch_assoc()){
            $genres[] = $row;
        }
        $result->close();
    }
    $mysqli->close();
    return $genres;
}