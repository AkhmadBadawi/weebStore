<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $dataBarang = new Barang;

        $rules = [
            'id_barang' => 'required|numeric|unique:barang,id_barang',
            'nama_barang' => 'required',
            'stok_barang' => 'required',
            'harga_barang' => 'required',
            'deskripsi' => 'required',
            'id_pemasok' => 'required|exists:pemasok,id_pemasok',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Memasukkan Data',
                'data' => $validator->errors()
            ]);
        }

        $dataBarang->id_barang = $request->id_barang;
        $dataBarang->nama_barang = $request->nama_barang;
        $dataBarang->stok_barang = $request->stok_barang;
        $dataBarang->harga_barang = $request->harga_barang;
        $dataBarang->deskripsi = $request->deskripsi;
        $dataBarang->id_pemasok = $request->id_pemasok;


        $post = $dataBarang->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dimasukkan'
        ]);
    }

    public function show(string $id_barang)
    {
        $data = Barang::find($id_barang);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    public function update(Request $request, string $id_barang)
    {
        $dataBarang = Barang::find($id_barang);
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'nama_barang' => 'required',
            'stok_barang' => 'required',
            'harga_barang' => 'required',
            'deskripsi' => 'required',
            'id_pemasok' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Memasukkan Data',
                'data' => $validator->errors()
            ]);
        }

        $dataBarang->nama_barang = $request->nama_barang;
        $dataBarang->stok_barang = $request->stok_barang;
        $dataBarang->harga_barang = $request->harga_barang;
        $dataBarang->deskripsi = $request->deskripsi;
        $dataBarang->id_pemasok = $request->id_pemasok;


        $post = $dataBarang->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ]);
    }

    public function destroy(string $id_barang)
    {
        $dataBarang = Barang::find($id_barang);
        if (empty($dataBarang)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $dataBarang->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
