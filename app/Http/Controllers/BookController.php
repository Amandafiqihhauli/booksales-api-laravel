<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Author;

class BookController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $authors = Author::all();

        return view('books', compact('genres', 'authors'));
    }
}
