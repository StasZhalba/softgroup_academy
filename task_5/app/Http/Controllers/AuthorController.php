<?php

namespace App\Http\Controllers;

use App\Author;
use App\Country;
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

    public function addAuthor(Request $request){
        $country = Country::all();
        if ($request->isMethod('post')){
            $author = new Author();
            $author->surname = $request->surname;
            $author->name = $request->name;
            $author->yearOfBirth = $request->year_birth;
            $author->yearOfDeath = $request->year_death;
            $author->countryId = $request->country;
        }
        return view('author_admin')->with('items', $country);
    }
}
