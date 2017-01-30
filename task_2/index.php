<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 24.01.2017
 * Time: 16:06
 */

require_once ('models/author.php');
require_once ('models/book.php');
require_once ('models/genre.php');
require_once ('models/edition.php');
require_once ('database.php');


$link = db_connect();

function header_block(){
    echo '<a href="index.php?object=book"> Книги </a>';
    echo '<a href="index.php?object=author"> Автори </a>';
    echo '<a href="index.php?object=edition"> Видавництва </a><br>';
}

function book_block(){

}

if (isset($_GET['object'])){
    $object = $_GET['object'];
}
else {
    $object = "";
    header_block();
}

if ($object == "book"){
    header_block();
    if (!empty($_POST)){
        var_dump($_POST);
        add_book_to_db($link , $_POST['authors'] ,$_POST['book_name'], $_POST['genre'], (int)$_POST['pages'],
            (int)$_POST['publisher_year'], $_POST['edition'], $_POST['book_receipt']);
        //header("Location: index.php?object=book");
    }
    $authors = authors_all($link);
    $genres = genres_all($link);
    $editions = edition_all($link);
    $books = books_all($link);
    include ('view/book_admin.php');
    include ('view/books.php');
    if (isset($_GET['action']) & isset($_GET['id'])){
        $action = $_GET['action'];
        $id = (int)$_GET['id'];
        if ($action == 'delete' & is_numeric($id)){
            delete_book($link, $id);
        }
    }
}

/*if ($object == "book"){
    if ($action == "add"){
        if (!empty($_POST)){
            add_book_to_db($_POST['book_name'], $POST['genre'], $_POST['pages'], $_POST['publisher_year'], $_POST['editon'], $POST['book_receipt']);
            header("Location: index.php");
        }
        $authors = authors_all();
        $genres = genres_all();
        $editions = edition_all();
        include ('view/book_admin.php');
    }
}*/




