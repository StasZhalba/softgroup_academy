<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 09.02.2017
 * Time: 19:56
 */

class Author extends DB{
    protected $surname;
    protected $name;
    protected $yearOfBirth;
    protected $yearOfDeath;
    protected $country;

    /**
     * Author constructor.
     * @param $surname
     * @param $name
     * @param $yearOfBirth
     * @param $yearOfDeath
     * @param $country
     */
    public function __construct($dbInfo, $surname, $name, $yearOfBirth, $yearOfDeath, $country)
    {
        parent::__construct($dbInfo);
        $this->surname = $surname;
        $this->name = $name;
        $this->yearOfBirth = $yearOfBirth;
        $this->yearOfDeath = $yearOfDeath;
        $this->country = $country;
    }

    function authors_all(){

        $mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);

        if ($result = $mysql->query('SELECT author.author_id, author.author_surname, author.author_name, 
                                  author.author_year_of_birth, author.author_death, country.country_name FROM author 
                                  INNER JOIN country ON author.author_country=country.country_id
                                  ORDER BY author_surname, author_name ASC ;')){
            $authors = array();
            while ($row = mysqli_fetch_assoc($result)){
                $authors[] = $row;
            }
        }

        $mysql->close();

        return $authors;
    }

}

