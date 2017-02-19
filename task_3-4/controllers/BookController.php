<?php

/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 18.02.2017
 * Time: 14:04
 */
class BookController
{
    public function actionAll()
    {
        $books = Book::bookAll();
        $view = new View();
        $view->items = $books;
        $view->display('books.php');
    }

    public function actionAdd()
    {
        $view = new View();
        $view->authors = Author::findAll();
        $view->genres = Genre::findAll();
        $view->editions = Edition::findAll();
        $view->display('book_admin.php');
        echo '<a href="/site/softgroup_academy/task_3-4/book/all">All books</a><br>';
        if (!empty($_POST)){
            $book = new Book();
            $book->author = intval($_POST['authors']);
            $book->name = $_POST['book_name'];
            $book->genre = intval($_POST['genre']);
            $book->pages = intval($_POST['pages']);
            $book->publisherYear = intval($_POST['publisher_year']);
            $book->edition = intval($_POST['edition']);
            $book->receipt = $_POST['book_receipt'];
            $book->save();
            var_dump($book);
        }
    }

    public function actionAuthor()
    {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            if (is_numeric($id)){
                $view = new View();
                $view->items = Book::findBooks(Book::$findAuthor, $id);
                $view->display('books.php');
            }
        }
    }

    public function actionEdition()
    {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            if (is_numeric($id)){
                $view = new View();
                $view->items = Book::findBooks(Book::$findEdition, $id);
                $view->display('books.php');
            }
        }
    }

    public function actionDelete()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            if (is_numeric($id)){
                $book = Book::findOneByPK($id);
                $book->delete();
                header("Location: /site/softgroup_academy/task_3-4/book/all");
            }
        }
    }
}