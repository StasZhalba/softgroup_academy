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

    if ($result = $mysqli->query('SELECT * FROM author ORDER BY author_surname, author_name ASC ;')){
        $authors = array();
        while ($row = $result->fetch_assoc()){
            $authors[] = $row;
        }
        $result->close();
    }
    $mysqli->close();
    return $authors;
}

function add_author_to_db($surname, $name, $year_of_birth, $year_of_death, $country){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");
    if (mysqli_connect_errno()){
        printf("Неможливо підключитись до бази даних. Код помилки: %s\n", mysqli_connect_error());
        exit;
    }
    $surname = mysqli_real_escape_string($mysqli, trim($surname));
    $name = mysqli_real_escape_string($mysqli, trim($name));
    $country = mysqli_real_escape_string($mysqli, trim($country));

    if ($year_of_death == null | empty($year_of_death)) {
        $mysqli->query("INSERT INTO author (author_surname, author_name, author_year_of_birth, author_death, 
                          author_country) VALUES ('$surname', '$name', '$year_of_birth', '$year_of_death', '$country');");
    }
    $mysqli->close();
}