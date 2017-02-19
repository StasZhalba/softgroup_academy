<?php

/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 19.02.2017
 * Time: 16:33
 */
class City extends AbstractModel
{
    protected static $table = 'city';
    protected static $tableID = 'cityId';

    public static function cityAll()
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = "SELECT city.cityId, city.cityName, country.countryName 
                FROM city
                INNER JOIN country ON city.cityCountry=country.countryId";

        return $db->query($sql);
    }

}