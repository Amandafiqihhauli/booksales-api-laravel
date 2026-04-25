<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Menampilkan semua penulis beserta buku yang mereka tulis
    public function index()
    {
        $authors = Author::with('books')->get();

        return response()->json([
            'status' => 'success',
            'data' => $authors
        ]);
    }

    // membuat penulis baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $author
        ], 201);
    }

    // menampilkan penulis berdasarkan id
    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }

        return response()->json($author);
    }

    // mengupdate penulis berdasarkan id
    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required'
        ]);

        $author->update([
            'name' => $request->name
        ]);

        return response()->json($author);
    }

    // menghapus penulis berdasarkan id
    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }

        $author->delete();

        return response()->json([
            'message' => 'Author deleted successfully'
        ]);
    }
}
