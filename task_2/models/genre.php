<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 28.01.2017
 * Time: 11:58
 */


function genres_all($link){
    if ($result = mysqli_query($link, 'SELECT * FROM genre;')){
        $genres = array();
        while ($row = mysqli_fetch_assoc($result)){
            $genres[] = $row;
        }
    }
    return $genres;
}
