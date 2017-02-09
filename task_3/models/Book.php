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
}