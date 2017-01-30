<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 27.01.2017
 * Time: 19:19
 */

require_once ('validation.php');

function add_book_to_db($link, $author_name, $book_name, $genre, $pages, $publisher_year, $edition, $receipt){
    if (validation_author($author_name, $book_name, $genre, $pages, $publisher_year,
        $edition, $receipt)){

        $author_name = mysqli_real_escape_string($link, trim($author_name));
        $book_name = mysqli_real_escape_string($link, trim($book_name));
        $genre = mysqli_real_escape_string($link, trim($genre));
        $edition = mysqli_real_escape_string($link, trim($edition));

        $result = mysqli_query($link, "INSERT INTO book (book_author, book_name, book_genre, book_pages, book_publisher_year, 
                        book_edition, book_receipt) VALUES ('$author_name', '$book_name', '$genre', 
                        '$pages', '$publisher_year', '$edition', '$receipt');");
        if (!$result){
            die(mysqli_error($link));
        }
    }
}

function delete_book($link, $id){
    if (is_numeric($id)) {
        $result = mysqli_query($link, "DELETE FROM book WHERE id='$id';");
    }

    if ($result){
        die(mysqli_error($link));
    }
}

function books_all($link){
    if ($result = mysqli_query($link, 'SELECT book.book_id, author.author_id, author.author_surname, author.author_name, book.book_name, genre.genre_name, 
                          book.book_pages, book.book_publisher_year, edition.edition_id, edition.edition_name, book.book_receipt FROM book
                          INNER JOIN author ON book.book_author=author.author_id
                          INNER JOIN genre ON book.book_genre=genre.genre_id
                          INNER JOIN edition ON book.book_edition=edition.edition_id;')){
        $books = array();
        while ($row = mysqli_fetch_assoc($result)){
            $books[] = $row;
        }
    }
    return $books;
}



function get_books_author($link, $id){

    if ($result = mysqli_query($link, "SELECT book.book_id, author.author_surname, book.book_name, genre.genre_name, 
                          book.book_pages, book.book_publisher_year, edition.edition_name, book.book_receipt FROM book
                          INNER JOIN author ON book.book_author=author.author_id
                          INNER JOIN genre ON book.book_genre=genre.genre_id
                          INNER JOIN edition ON book.book_edition=edition.edition_id WHERE book.book_author = '$id';")){
        $books = array();
        while ($row = mysqli_fetch_assoc($result)){
            $books[] = $row;
        }
    }


    return $books;
}

function get_books_edition($id){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");
    if (mysqli_connect_errno()){
        printf("Неможливо підключитись до бази даних. Код помилки: %s\n", mysqli_connect_error());
        exit;
    }

    if ($result = $mysqli->query("SELECT book.book_id, author.author_surname, book.book_name, genre.genre_name, 
                          book.book_pages, book.book_publisher_year, edition.edition_name, book.book_receipt FROM book
                          INNER JOIN author ON book.book_author=author.author_id
                          INNER JOIN genre ON book.book_genre=genre.genre_id
                          INNER JOIN edition ON book.book_edition=edition.edition_id WHERE book.book_edition = '$id';")){
        $books = array();
        while ($row = $result->fetch_assoc()){
            $books[] = $row;
        }
        $result->close();
    }
    $mysqli->close();
    return $books;
}

function search_book($link, $book_search, $sort)
{
    if (!empty($book_search)) {
        $search_query = "SELECT book.book_id, author.author_surname, book.book_name, genre.genre_name, 
                          book.book_pages, book.book_publisher_year, edition.edition_name, book.book_receipt FROM book
                          INNER JOIN author ON book.book_author=author.author_id
                          INNER JOIN genre ON book.book_genre=genre.genre_id
                          INNER JOIN edition ON book.book_edition=edition.edition_id ";
        $clean_search = str_replace(',', ' ', $book_search);
        $search_words = explode(' ', $clean_search);
        $final_search_words = array();
        if (count($search_words) > 0) {
            foreach ($search_words as $word) {
                if (!empty($word)) {
                    $final_search_words[] = $word;
                }
            }
        }
        if (count($final_search_words) > 0) {
            foreach ($final_search_words as $word) {
                $where_list[] = "book_name LIKE '%$word%' OR author_surname LIKE '%$word%' OR edition_name LIKE '%$word%'";
            }
            $where_clause = implode(' OR ', $where_list);
        }
        if (!empty($where_clause)) {
            $search_query .= " WHERE $where_clause";
        }


        switch ($sort) {
            // Ascending by job title
            case 1:
                $search_query .= " ORDER BY author_surname";
                break;
            // Descending by job title
            case 2:
                $search_query .= " ORDER BY book_name";
                break;
            // Ascending by state
            case 3:
                $search_query .= " ORDER BY genre_name";
                break;
            // Descending by state
            case 4:
                $search_query .= " ORDER BY book_pages";
                break;
            // Ascending by date posted (oldest first)
            case 5:
                $search_query .= " ORDER BY book_publisher_year";
                break;
            // Descending by date posted (newest first)
            case 6:
                $search_query .= " ORDER BY edition_name";
                break;
            case 7:
                $search_query .= " ORDER BY book_receipt";
            default:
                // No sort setting provided, so don't sort the query
        }


        if ($result = mysqli_query($link, $search_query)) {
            $books = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $books[] = $row;
            }
        }
        mysqli_close($link);

        return $books;
    }
    else {
        return null;
    }
}


