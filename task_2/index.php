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
require_once ('models/country.php');
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
//    if (!empty($_POST)){
//        add_book_to_db($link , $_POST['authors'] ,$_POST['book_name'], $_POST['genre'], (int)$_POST['pages'],
//            (int)$_POST['publisher_year'], $_POST['edition'], $_POST['book_receipt']);
//        //header("Location: index.php?object=book");
//    }

    $authors = authors_all($link);
    $genres = genres_all($link);
    $editions = edition_all($link);

    if (isset($_GET['show']) & isset($_GET['id'])) {
        if (is_numeric($_GET['id'])){
            $view = $_GET['show'];
            $id = $_GET['id'];

            if ($view == 'author') {
                $books = get_books_author($link, $id);
            } else if ($view == 'edition') {
                $books = get_books_edition($link, $id);
            } else {
                $books = books_all($link);

            }
            include('view/book_admin.php');
            include('view/books.php');
        }
    } else {
        $books = books_all($link);

        include ('view/book_admin.php');
        include ('view/books.php');
    }

    if (!empty($_POST)){
        $books = search_book($link,$_POST['search']);
        var_dump($books);
        include ('view/books.php');
    }


    if (isset($_GET['action']) & isset($_GET['id'])){
        $action = $_GET['action'];
        $id = (int)$_GET['id'];
        if ($action == 'delete' & is_numeric($id)){
            delete_book($link, $id);
        }
    }
} else if ($object == "author"){
    header_block();
    if (!empty($_POST)){
        add_author_to_db($link, $_POST['surname'], $_POST['name'], $_POST['year_birth'],
            $_POST['year_death'], $_POST['country']);
        //header("Location: index.php?object=book");
    }

    if (isset($_GET['action']) & isset($_GET['id'])){
        $action = $_GET['action'];
        $id = (int)$_GET['id'];
        if ($action == 'delete' & is_numeric($id)){
            delete_author($link, $id);
        }
    }

    $countries = country_all($link);
    $authors = authors_all($link);

    include ('view/author_admin.php');
    include ('view/authors.php');
} else if ($object == "edition"){
    header_block();
    if (!empty($_POST)){
        $address = $_POST['country_city'] . ', ' . $_POST['street'] . ', ' . $_POST['home'];
        add_edition($link, $_POST['name'], $address, $_POST['ZIP'], $_POST['contact_person']);
    }

    if (isset($_GET['action']) & isset($_GET['id'])){
        $action = $_GET['action'];
        $id = (int)$_GET['id'];
        if ($action == 'delete' & is_numeric($id)){
            delete_author($link, $id);
        }
    }

    $cities = city_all($link);
    $authors = authors_all($link);
    $editions = edition_all($link);

    include ('view/edition_admin.php');
    include ('view/editions.php');

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




