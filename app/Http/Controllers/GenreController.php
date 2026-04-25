<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // Menampilkan semua genre
    public function index()
    {
        $genres = Genre::all();

        return response()->json([
            'status' => 'success',
            'data' => $genres
        ]);
    }

    // membuat genre baru
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $genre
        ], 201);
    }

    // menampilkan genre berdasarkan id
    public function show($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'message' => 'Genre not found'
            ], 404);
        }

        return response()->json($genre);
    }

    // mengupdate genre berdasarkan id
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'message' => 'Genre not found'
            ], 404);
        }

        $request->validate([
            'name' => 'required'
        ]);

        $genre->update([
            'name' => $request->name
        ]);

        return response()->json($genre);
    }

    // menghapus genre berdasarkan id
    public function destroy($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'message' => 'Genre not found'
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'message' => 'Genre deleted successfully'
        ]);
    }
}
