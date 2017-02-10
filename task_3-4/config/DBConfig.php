<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 10.02.2017
 * Time: 16:40
 */

class DBConfig{
    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;

    function Dbconfig() {
        $this -> serverName = 'localhost';
        $this -> userName = 'root';
        $this -> passCode = '';
        $this -> dbName = 'books';
    }
}