<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 09.02.2017
 * Time: 19:56
 * @property $id
 * @property $surname
 * @property $name
 * @property $yearOfBirth
 * @property $death
 * @property $countryName
 */




class Author extends AbstractModel {

    protected static $table = 'author';
    protected static $tableID = 'authorId';

    public static function authorsAll($sort = 0){

        $db = new DB();
        $db->setClassName(get_called_class());
        $query ='SELECT author.authorId, author.authorSurname, author.authorName, 
                                  author.authorYearOfBirth, author.authorDeath, country.countryName 
                                  FROM author 
                                  INNER JOIN country ON author.authorCountryName=country.countryId ';

        switch ($sort){
            case 1:
                $query .= "ORDER BY author.authorSurname DESC";
                break;
            case 2:
                $query .= "ORDER BY author.authorName DESC";
                break;
            case 3:
                $query .= "ORDER BY author.authorYearOfBirth DESC";
                break;
            case 4:
                $query .= "ORDER BY author.authorDeath DESC";
                break;
            case 5:
                $query .= "ORDER BY country.countryName DESC";
                break;
            default:

        }

        return $db->query($query);
    }


}

