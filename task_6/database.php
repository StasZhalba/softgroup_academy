<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 25.01.2017
 * Time: 15:30
 */

define('DB_NAME', 'books');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

function db_connect(){
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die("Error: ".mysqli_errno($link));
    if (!mysqli_set_charset($link, "utf8")){
        printf("Error: ".mysqli_error($link));
    }

    return $link;
}