<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 24.01.2017
 * Time: 16:06
 */


add_author_to_db('', 'Jjkdaskf', 'jdaskfj', 'fjasjhf', 232, 1111, 'adfas', '2014-10-25');

function add_author_to_db($post_name, $author_name, $book_name, $genre, $pages, $publisher_year,
                          $edition, $receipt){
    if (validation_author($author_name, $book_name, $genre, $pages, $publisher_year,
        $edition, $receipt)){
        echo "<h1>add_author_to_db validate is true</h1>";
    }
    else {
        echo "<h1>add_author_to_db validate is false</h1>";
    }
}

function validation_author($author_name, $book_name, $genre, $pages, $publisher_year,
                           $edition, $receipt){
    if (empty($author_name) | empty($book_name) | empty($genre) | empty($pages) |
        empty($publisher_year) | empty($edition) | empty($receipt) | is_numeric($pages) | $pages < 1 |
        $publisher_year < 1800 | intval($publisher_year) > intval(date("Y")) | $receipt > date("Y-m-d")){
        return false;
    } else {
        return true;
    }
}

function check_format_date($date){
    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
    {
        return true;
    }else{
        return false;
    }
}