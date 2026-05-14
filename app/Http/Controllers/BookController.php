<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::with(['author', 'genre'])->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $book
        ]);
    }

    public function index()
    {
        $books = Book::with('author', 'genre')->get();

        return response()->json([
            'status' => 'success',
            'data' => $books
        ]);
    }

    public function store(Request $request)
    {
        \Log::info($request->all());
        \Log::info($request->file('cover_photo'));

        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author_id' => 'required|exists:authors,id',
        'genre_id' => 'required|exists:genres,id',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
        'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('cover_photo')) {
        $validated['cover'] = $request->file('cover_photo')->store('covers', 'public');
        }

        $validated['description'] = $request->description;

        \Log::info($validated);

        $book = \App\Models\Book::create($validated);

        return response()->json([
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }

    // public function destroy($id)
    // {
    //     $book = Book::findOrFail($id);

    //     if ($book->cover) {
    //         Storage::disk('public')->delete($book->cover);
    //     }

    //     $book->delete();

    //     return response()->json([
    //         'message' => 'Book deleted successfully'
    //     ]);
    // }

    public function destroy($id)
    {
    $book = Book::findOrFail($id);

    $book->delete();

    return response()->json([
        'message' => 'Book deleted successfully'
    ]);
    }

}


