<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 10.02.2017
 * Time: 9:51
 */

class Country extends AbstractModel {

    protected static $table = 'country';
    protected static $tableID = 'countryId';

    public function city_all(){
        /*$db = new DB();
        $mysql = $db->DBConnection();

        if ($result = $mysql->query("SELECT city.city_id, city.city_name, country.country_name FROM city 
                                        INNER JOIN country ON city.city_country=country.country_id;")){
            $cities = array();
            while ($row = mysqli_fetch_assoc($result)){
                $cities[] = $row;
            }
        }

        $mysql->close();

        return $cities;*/
    }
}