<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Genre;
use Illuminate\Http\Request;
use DB;


class BookController extends Controller
{
    public function getBooks($sort = 0){
        switch ($sort){
            case 1:
                $books = Book::orderBy('authorId', 'desc')->get();
                break;
            case 2:
                $books = Book::orderBy('name', 'desc')->get();;
                break;
            case 3:
                $books = Book::orderBy('genreId', 'desc')->get();
                break;
            case 4:
                $books = Book::orderBy('pages', 'desc')->get();
                break;
            case 5:
                $books = Book::orderBy('publisherYear', 'desc')->get();
                break;
            case 6:
                $books = Book::orderBy('editionId', 'desc')->get();
                break;
            case 7:
                $books = Book::orderBy('receipt', 'desc')->get();
                break;
            default:
                $books = Book::all();
        }

        return view('books')->with('items', $books);
    }

    public function getBooksWhere($where, $id, $sort = 0){
        switch ($sort){
            case 1:
                $orderBy = 'authorId';
                break;
            case 2:
                $orderBy = 'name';
                break;
            case 3:
                $orderBy = 'genreId';
                break;
            case 4:
                $orderBy = 'pages';
                break;
            case 5:
                $orderBy = 'publisherYear';
                break;
            case 6:
                $orderBy = 'editionId';
                break;
            case 7:
                $orderBy = 'receipt';
                break;
            default:
                $orderBy = 'null';
        }
        if ($orderBy == 'null'){
            $books = Book::where($where, $id)->get();
        } else {
            $books = Book::where($where, $id)->orderBy($orderBy, 'desc')->get();
        }

        return view('books')->with('items', $books);
    }

    public function deleteBook($id){
        Book::destroy($id);
        return redirect()->route('bookAll');
    }

    public function addAuthor(Request $request){
        $authors = Author::all();
        $genres = Genre::all();
        $editions = Author::all();
        if ($request->isMethod('post')){
            $book = new Book();
            $book->authorId = $request->authors;
            $book->name = $request->book_name;
            $book->genreId = $request->genre;
            $book->pages = $request->pages;
            $book->publisherYear = $request->publisher_year;
            $book->edtionId = $request->edition;
            $book->receipt = $request->book_receipt;
        }
        return view('book_admin')->with(['authors' => $authors, 'genres' => $genres, 'editions' => $editions]);
    }
}
