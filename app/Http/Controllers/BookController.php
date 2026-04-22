<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $authors = Author::all();
        $books = Book::with('author')->get();
        
        return view('books', compact('genres', 'authors', 'books'));
    }
}
