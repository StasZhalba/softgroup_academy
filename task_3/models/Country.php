<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 10.02.2017
 * Time: 9:51
 */

class Country extends DB{

    public function city_all(){
        $mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);

        if ($result = $mysql->query("SELECT city.city_id, city.city_name, country.country_name FROM city 
                                        INNER JOIN country ON city.city_country=country.country_id;")){
            $cities = array();
            while ($row = mysqli_fetch_assoc($result)){
                $cities[] = $row;
            }
        }

        $mysql->close();

        return $cities;
    }
}