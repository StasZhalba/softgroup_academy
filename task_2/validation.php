<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 26.01.2017
 * Time: 15:57
 */

function check_format_date($date){
    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
    {
        return true;
    }else{
        return false;
    }
}

function validation_author($author_name, $book_name, $genre, $pages, $publisher_year,
                           $edition, $receipt){
    if (empty($author_name) | empty($book_name) | empty($genre) | empty($pages) |
        empty($publisher_year) | empty($edition) | empty($receipt) | !is_numeric($pages) | $pages < 1 |
        $publisher_year < 1800 | intval($publisher_year) > intval(date("Y")) | !check_format_date($receipt)){
        return false;
    } else {
        $date = explode('-', $receipt);
        $year = intval($date[0]);
        $mounth = intval($date[1]);
        $day = intval($date[2]);
        if ($year < date("Y")){
            if (checkdate($mounth, $day, $year)){
                return true;
            }
            else {
                return false;
            }
        }
        else if ($year >= date("Y") & $mounth > date("m")){
            return false;
        }
        else if ($year >= date("Y") & $day > date("d")) {
            return false;
        }
        else {
            return true;
        }
    }
}