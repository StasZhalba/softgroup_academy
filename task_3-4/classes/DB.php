<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 05.02.2017
 * Time: 17:51
 */

class DB{
    private $dbh;
    private $className = 'stdClass';


    public function __construct(){
        $this->dbh = new PDO('mysql:dbname=books;host=localhost', 'root', '');
        $this->dbh->exec('set names utf8');
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastInsertID()
    {
        return $this->dbh->lastInsertId();
    }





}