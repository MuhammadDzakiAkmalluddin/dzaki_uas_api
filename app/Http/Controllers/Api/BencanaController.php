<?php

namespace App\Http\Controllers\api; // 1. Pastikan folder path benar

use App\Http\Controllers\Controller;
use App\Models\Bencana; // 2. Pastikan B-nya Kapital dan ada titik koma (;)
use Illuminate\Http\Request;

class BencanaController extends Controller
{
    /**
     * Menampilkan semua daftar bencana.
     */
    public function index()
    {
        $bencana = Bencana::all();
        return response()->json($bencana);
    }

    /**
     * Menyimpan data bencana baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_bencana' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        $bencana = Bencana::create($request->all());
        
        return response()->json([
            'message' => 'Data Bencana Berhasil Ditambahkan',
            'data' => $bencana
        ], 201);
    }

    /**
     * Menampilkan detail satu bencana berdasarkan ID.
     */
    public function show(string $id)
    {
        $bencana = Bencana::find($id);
        if ($bencana) {
            return response()->json($bencana);
        }
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    /**
     * Memperbarui data bencana yang sudah ada.
     */
    public function update(Request $request, string $id)
    {
        $bencana = Bencana::find($id);
        if ($bencana) {
            $bencana->update($request->all());
            return response()->json([
                'message' => 'Data Bencana Berhasil Diupdate',
                'data' => $bencana
            ]);
        }
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    /**
     * Menghapus data bencana dari database.
     */
    public function destroy(string $id)
    {
        $bencana = Bencana::find($id);
        if ($bencana) {
            $bencana->delete();
            return response()->json(['message' => 'Data Bencana Berhasil Dihapus']);
        }
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}