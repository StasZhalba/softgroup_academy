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
        $result = mysqli_query($link, "DELETE FROM book WHERE book_id='$id';");
    }

    if ($result){
        die(mysqli_error($link));
    }
}

function books_all($link, $sort){
    $query = "SELECT book.book_id, author.author_id, author.author_surname, author.author_name, 
book.book_name, genre.genre_name, book.book_pages, book.book_publisher_year, edition.edition_id, edition.edition_name, 
book.book_receipt FROM book
                          INNER JOIN author ON book.book_author=author.author_id
                          INNER JOIN genre ON book.book_genre=genre.genre_id
                          INNER JOIN edition ON book.book_edition=edition.edition_id ";


    switch ($sort){
        case 1:
            $query .= "ORDER BY author.author_name";
            break;
        case 2:
            $query .= "ORDER BY book.book_name";
            break;
        case 3:
            $query .= "ORDER BY genre.genre_name";
            break;
        case 4:
            $query .= "ORDER BY book.book_pages";
            break;
        case 5:
            $query .= "ORDER BY book.book_publisher_year";
            break;
        case 6:
            $query .= "ORDER BY edition.edition_name";
            break;
        case 7:
            $query .= "ORDER BY book.book_receipt";
        default:

    }

    if ($result = mysqli_query($link, $query)){
        $books = array();
        while ($row = mysqli_fetch_assoc($result)){
            $books[] = $row;
        }
    }
    return $books;
}



function get_books_author($link, $id){

    if ($result = mysqli_query($link, "SELECT book.book_id, author.author_id, author.author_surname, author.author_name, book.book_name, genre.genre_name, 
                          book.book_pages, book.book_publisher_year, edition.edition_id, edition.edition_name, book.book_receipt FROM book
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

function get_books_edition($link, $id){


    if ($result = mysqli_query($link, "SELECT book.book_id, author.author_id, author.author_surname, author.author_name, book.book_name, genre.genre_name, 
                          book.book_pages, book.book_publisher_year, edition.edition_id, edition.edition_name, book.book_receipt FROM book
                          INNER JOIN author ON book.book_author=author.author_id
                          INNER JOIN genre ON book.book_genre=genre.genre_id
                          INNER JOIN edition ON book.book_edition=edition.edition_id WHERE book.book_edition = '$id';")){
        $books = array();
        while ($row = $result->fetch_assoc()){
            $books[] = $row;
        }
    }
    return $books;
}

function search_book($link, $book_search)
{
    if (!empty($book_search)) {
        $search_query = "SELECT book.book_id, author.author_id, author.author_surname, author.author_name, book.book_name, genre.genre_name, 
                          book.book_pages, book.book_publisher_year, edition.edition_id, edition.edition_name, book.book_receipt FROM book
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




        if ($result = mysqli_query($link, $search_query)) {
            $books = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $books[] = $row;
            }
        }

        return $books;
    }
    else {
        return null;
    }
}


