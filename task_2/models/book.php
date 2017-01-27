<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 27.01.2017
 * Time: 19:19
 */

function add_book_to_db($author_name, $book_name, $genre, $pages, $publisher_year, $edition, $receipt){
    if (validation_author($author_name, $book_name, $genre, $pages, $publisher_year,
        $edition, $receipt)){
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $mysqli->set_charset("utf8");
        if (mysqli_connect_errno()){
            printf("Неможливо підключитись до бази даних. Код помилки: %s\n", mysqli_connect_error());
            exit;
        }
        $author_name = mysqli_real_escape_string($mysqli, trim($author_name));
        $book_name = mysqli_real_escape_string($mysqli, trim($book_name));
        $genre = mysqli_real_escape_string($mysqli, trim($genre));
        $edition = mysqli_real_escape_string($mysqli, trim($edition));

        $mysqli->query("INSERT INTO book (book_author, book_name, book_genre, book_page, book_publiher_year, 
                        book_edition, book_receipt) VALUES ('$author_name', '$book_name', '$genre', 
                        '$pages', '$publisher_year', '$edition', '$receipt');");
        $mysqli->close();
    }
}