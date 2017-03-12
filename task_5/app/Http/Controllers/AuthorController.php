<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getAuthors($sort = 0){
        switch ($sort){
            case 1:
                $authors = Author::orderBy('name', 'desc')->get();
                break;
            case 2:
                $authors = Author::orderBy('surname', 'desc')->get();
                break;
            case 3:
                $authors = Author::orderBy('yearOfBirth', 'desc')->get();
                break;
            case 4:
                $authors = Author::orderBy('yearOfDeath', 'desc')->get();
                break;
            case 5:
                $authors = Author::orderBy('countryId', 'desc')->get();
                break;
            default:
                $authors = Author::all();
        }

        return view('authors')->with('items', $authors);
    }

    public function deleteAuthor($id){
        Author::destroy($id);
        return redirect()->route('authorsAll');
    }
}
