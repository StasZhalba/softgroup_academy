<?php

/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 27.01.2017
 * Time: 18:51
 */

require_once ('database.php');

function add_author_to_db($link, $surname, $name, $year_of_birth, $year_of_death, $country){

    $surname = mysqli_real_escape_string($link, trim($surname));
    $name = mysqli_real_escape_string($link, trim($name));
    $country = mysqli_real_escape_string($link, trim($country));

    $result = mysqli_query($link, "INSERT INTO author (author_surname, author_name, author_year_of_birth, author_death, 
                          author_country) VALUES ('$surname', '$name', '$year_of_birth', '$year_of_death', '$country');");


    if (!$result)
        die(mysqli_errno($link));

}

function delete_author($link, $id){
    if (is_numeric($id)) {
        $result = mysqli_query($link, "DELETE FROM author WHERE author_id='$id';");
    }
    if (!$result)
        die(mysqli_errno($link));

}


function authors_all($link){

    if ($result = mysqli_query($link, 'SELECT author.author_id, author.author_surname, author.author_name, 
                                  author.author_year_of_birth, author.author_death, country.country_name FROM author 
                                  INNER JOIN country ON author.author_country=country.country_id
                                  ORDER BY author_surname, author_name ASC ;')){
        $authors = array();
        while ($row = mysqli_fetch_assoc($result)){
            $authors[] = $row;
        }
    }

    return $authors;
}

