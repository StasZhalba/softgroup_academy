<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 30.01.2017
 * Time: 10:54
 */

function country_all($link){
    if ($result = mysqli_query($link, 'SELECT * FROM country;')){
        $country = array();
        while ($row = mysqli_fetch_assoc($result)){
            $country[] = $row;
        }
    }
    return $country;
}

function city_all($link){

    if ($result = mysqli_query($link, "SELECT city.city_id, city.city_name, country.country_name FROM city 
                                        INNER JOIN country ON city.city_country=country.country_id;")){
        $cities = array();
        while ($row = mysqli_fetch_assoc($result)){
            $cities[] = $row;
        }
    }

    return $cities;
}