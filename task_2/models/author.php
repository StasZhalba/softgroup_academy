<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 27.01.2017
 * Time: 18:51
 */

function authors_all(){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");
    if (mysqli_connect_errno()){
        printf("Неможливо підключитись до бази даних. Код помилки: %s\n", mysqli_connect_error());
        exit;
    }

    if ($result = $mysqli->query('SELECT author_id, author_surname, author_name FROM author 
ORDER BY author_surname, author_name ASC ;')){
        $authors = array();
        while ($row = $result->fetch_assoc()){
            $authors[] = $row;
        }
        $result->close();
    }
    $mysqli->close();
    return $authors;
}

function add_author_to_db(){

}