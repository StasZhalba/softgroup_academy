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

    public static function authors_all(){

        $db = new DB();
        $db->setClassName(get_called_class());
        $result = $db->query('SELECT author.authorId, author.authorSurname, author.authorName, 
                                  author.authorYearOfBirth, author.authorDeath, country.countryName 
                                  FROM author 
                                  INNER JOIN country ON author.authorCountryName=country.countryId;');

        return $result;
    }


}

