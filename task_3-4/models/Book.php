<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 09.02.2017
 * Time: 20:35
 * @property $id
 * @property $author
 * @property $name
 * @property $genre
 * @property $pages
 * @property $publisherYear
 * @property $edition
 * @property $receipt
 */

class Book extends AbstractModel {

    protected static $table = 'book';
    protected static $tableID = 'bookId';
    public static $findAuthor = 'bookAuthor';
    public static $findEdition = 'bookEdition';

    public static function bookAll($sort = 0)
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $query = 'SELECT book.bookId, author.authorId, author.authorSurname, author.authorName, 
                  book.bookName, genre.genreName, book.bookPages, book.bookPublisherYear, 
                  edition.editionId, edition.editionName, book.bookReceipt 
                  FROM book
                          INNER JOIN author ON book.bookAuthor=author.authorId
                          INNER JOIN genre ON book.bookGenre=genre.genreId
                          INNER JOIN edition ON book.bookEdition=edition.editionId ';

        switch ($sort){
            case 1:
                $query .= "ORDER BY author.authorName DESC";
                break;
            case 2:
                $query .= "ORDER BY book.bookName DESC";
                break;
            case 3:
                $query .= "ORDER BY genre.genreName DESC";
                break;
            case 4:
                $query .= "ORDER BY book.bookPages DESC";
                break;
            case 5:
                $query .= "ORDER BY book.bookPublisherYear DESC";
                break;
            case 6:
                $query .= "ORDER BY edition.editionName DESC";
                break;
            case 7:
                $query .= "ORDER BY book.bookReceipt DESC";
            default:

        }

        return $db->query($query);
    }



    public static function findBooks($param, $id)
    {
        $sql = "SELECT book.bookId, author.authorId, author.authorSurname, author.authorName, 
                  book.bookName, genre.genreName, book.bookPages, book.bookPublisherYear, 
                  edition.editionId, edition.editionName, book.bookReceipt 
                  FROM book
                          INNER JOIN author ON book.bookAuthor=author.authorId
                          INNER JOIN genre ON book.bookGenre=genre.genreId
                          INNER JOIN edition ON book.bookEdition=edition.editionId WHERE ";
        $sql .= self::$table . '.' . $param . '=:id';
        $db = new DB();
        $db->setClassName(get_called_class());
        return $db->query($sql, ['id' => $id]);
    }

    public static function searchBook($bookSearch)
    {
        $query = "SELECT book.bookId, author.authorId, author.authorSurname, author.authorName, 
                  book.bookName, genre.genreName, book.bookPages, book.bookPublisherYear, 
                  edition.editionId, edition.editionName, book.bookReceipt 
                  FROM book
                          INNER JOIN author ON book.bookAuthor=author.authorId
                          INNER JOIN genre ON book.bookGenre=genre.genreId
                          INNER JOIN edition ON book.bookEdition=edition.editionId ";

            $clean_search = str_replace(',', ' ', $bookSearch);
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
                    $where_list[] = "bookName LIKE '%$word%' OR authorSurname LIKE '%$word%' 
                                        OR editionName LIKE '%$word%'";
                }
                $where_clause = implode(' OR ', $where_list);
            }
            if (!empty($where_clause)) {
                $query .= " WHERE $where_clause";
            }

            $db = new DB();
            $db->setClassName(get_called_class());

            return $db->query($query);

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