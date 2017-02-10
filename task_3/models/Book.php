<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 09.02.2017
 * Time: 20:35
 */

class Book extends DB {
    protected $authorName;
    protected $bookName;
    protected $genre;
    protected $pages;
    protected $publisherYear;
    protected $edition;
    protected $receipt;

    public function __construct($dbInfo, $bookInfo)
    {
        parent::__construct($dbInfo);
        $this->authorName = $bookInfo['authorName'];
        $this->bookName = $bookInfo['bookName'];
        $this->genre = $bookInfo['genre'];
        $this->pages = $bookInfo['pages'];
        $this->publisherYear = $bookInfo['publisherYear'];
        $this->edition = $bookInfo['edition'];
        $this->receipt = $bookInfo['receipt'];
    }

    public function books_all($sort = 0){
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

        $mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);


        if ($result = $mysql->query($query)){
            $books = array();
            while ($row = mysqli_fetch_assoc($result)){
                $books[] = $row;
            }
        }

        $mysql->close();

        return $books;
    }

    public function get_books_author($id){
        $mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);

        if ($result = $mysql->query("SELECT book.book_id, author.author_id, author.author_surname, author.author_name, book.book_name, genre.genre_name, 
                          book.book_pages, book.book_publisher_year, edition.edition_id, edition.edition_name, book.book_receipt FROM book
                          INNER JOIN author ON book.book_author=author.author_id
                          INNER JOIN genre ON book.book_genre=genre.genre_id
                          INNER JOIN edition ON book.book_edition=edition.edition_id WHERE book.book_author = '$id';")){
            $books = array();
            while ($row = mysqli_fetch_assoc($result)){
                $books[] = $row;
            }
        }

        $mysql->close();

        return $books;
    }

    public function get_books_edition($id){

        $mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);

        if ($result = $mysql->query("SELECT book.book_id, author.author_id, author.author_surname, author.author_name, book.book_name, genre.genre_name, 
                          book.book_pages, book.book_publisher_year, edition.edition_id, edition.edition_name, book.book_receipt FROM book
                          INNER JOIN author ON book.book_author=author.author_id
                          INNER JOIN genre ON book.book_genre=genre.genre_id
                          INNER JOIN edition ON book.book_edition=edition.edition_id WHERE book.book_edition = '$id';")){
            $books = array();
            while ($row = $result->fetch_assoc()){
                $books[] = $row;
            }
        }

        $mysql->close();

        return $books;
    }

    public function search_book($link, $book_search)
    {
        if (!empty($book_search)) {
            $search_query = "SELECT book.book_id, author.author_id, author.author_surname, 
                              author.author_name, book.book_name, genre.genre_name, book.book_pages, 
                              book.book_publisher_year, edition.edition_id, edition.edition_name, 
                              book.book_receipt FROM book
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
                    $where_list[] = "book_name LIKE '%$word%' OR author_surname LIKE '%$word%' 
                                        OR edition_name LIKE '%$word%'";
                }
                $where_clause = implode(' OR ', $where_list);
            }
            if (!empty($where_clause)) {
                $search_query .= " WHERE $where_clause";
            }

            $mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);

            if ($result = $mysql->query($search_query)) {
                $books = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $books[] = $row;
                }
            }

            $mysql->close();

            return $books;
        }
        else {
            return null;
        }
    }

    public function check_format_date($date){
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
        {
            return true;
        }else{
            return false;
        }
    }

    private function validation_author($author_name, $book_name, $genre, $pages, $publisher_year,
                               $edition, $receipt){
        if (empty($author_name) | empty($book_name) | empty($genre) | empty($pages) |
            empty($publisher_year) | empty($edition) | empty($receipt) | !is_numeric($pages) | $pages < 1 |
            $publisher_year < 1800 | intval($publisher_year) > intval(date("Y")) | !check_format_date($receipt)){
            return false;
        } else {
            $date = explode('-', $receipt);
            $year = intval($date[0]);
            $mounth = intval($date[1]);
            $day = intval($date[2]);
            if ($year < date("Y")){
                if (checkdate($mounth, $day, $year)){
                    return true;
                }
                else {
                    return false;
                }
            }
            else if ($year >= date("Y") & $mounth > date("m")){
                return false;
            }
            else if ($year >= date("Y") & $day > date("d")) {
                return false;
            }
            else {
                return true;
            }
        }
    }
}