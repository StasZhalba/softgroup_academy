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

if (isset($_GET['object']) & isset($_GET['action'])){
    $object = $_GET['object'];
    $action = $_GET['action'];
}
else {
    $object = "";
    $action = "";
}

if ($object == "book"){
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
}


