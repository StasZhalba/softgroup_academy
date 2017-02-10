<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 24.01.2017
 * Time: 16:06
 */

require_once ('database.php');
require_once ('models/Author.php');
require_once ('models/DB.php');


$link = db_connect();

function header_block(){
    echo '<a href="index.php?object=book"> Книги </a>';
    echo '<a href="index.php?object=author"> Автори </a>';
    echo '<a href="index.php?object=edition"> Видавництва </a><br>';
}


$dbInfo = array('host' => 'localhost', 'user' => 'root', 'password' => '', 'dbName' => 'books');

$author = new Author($dbInfo, 'Test','Sss', 8898, 'jsdfhj');

var_dump($author);





