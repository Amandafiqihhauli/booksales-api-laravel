<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Menampilkan semua transaksi beserta informasi pengguna dan buku yang terkait
    public function index()
    {
        return response()->json(
            Transaction::with(['user', 'book'])->get()
        );
    }

    // Menampilkan detail transaksi berdasarkan ID
    public function show($id)
    {
        return response()->json(
            Transaction::with(['user', 'book'])->findOrFail($id)
        );
    }

    // Membuat transaksi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_number' => 'required',
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'total_amount' => 'required|numeric'
        ]);

        $transaction = Transaction::create($validated);

        return response()->json($transaction, 201);
    }

    // Mengupdate transaksi berdasarkan ID
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $validated = $request->validate([
            'order_number' => 'required',
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'total_amount' => 'required|numeric'
        ]);

        $transaction->update($validated);

        return response()->json($transaction);
    }

    // Menghapus transaksi berdasarkan ID
    public function destroy($id)
    {
        Transaction::destroy($id);

        return response()->json([
            'message' => 'Transaction deleted successfully'
        ]);
    }
}
